<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_studenata_se_moze_otvoriti(): void
    {
        $response = $this->get(route('studenti.index'));

        $response->assertStatus(200);
        $response->assertSee('Popis studenata');
    }

    public function test_student_se_moze_dodati(): void
    {
        $response = $this->post(route('studenti.store'), [
            'ime' => 'Ivan',
            'prezime' => 'Horvat',
            'status' => 'redovni',
            'godiste' => 2000,
            'prosjek' => 4.50,
            'stipendija' => 300.00,
        ]);

        $response->assertRedirect(route('studenti.index'));

        $this->assertDatabaseHas('studenti', [
            'ime' => 'Ivan',
            'prezime' => 'Horvat',
            'status' => 'redovni',
        ]);
    }

    public function test_neispravni_podaci_ne_prolaze_validaciju(): void
    {
        $response = $this
            ->from(route('studenti.create'))
            ->post(route('studenti.store'), [
                'ime' => 'I',
                'prezime' => '',
                'status' => 'nepoznat',
                'godiste' => 1970,
                'prosjek' => 7,
                'stipendija' => -100,
            ]);

        $response->assertRedirect(route('studenti.create'));

        $response->assertSessionHasErrors([
            'ime',
            'prezime',
            'status',
            'godiste',
            'prosjek',
            'stipendija',
        ]);

        $this->assertDatabaseCount('studenti', 0);
    }
}