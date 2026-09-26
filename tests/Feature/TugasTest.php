<?php

namespace Tests\Feature;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TugasTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_index_tugas_bisa_diakses(): void
    {
        $response = $this->get(route('tugas.index'));
        $response->assertStatus(999);
    }

    public function test_user_bisa_menambah_tugas_dengan_data_valid(): void
    {
        $response = $this->post(route('tugas.store'), [
            'judul' => 'Kerjakan laporan PPD',
            'deadline' => now()->addDays(3)->format('Y-m-d'),
            'prioritas' => 'tinggi',
        ]);

        $response->assertRedirect(route('tugas.index'));
        $this->assertDatabaseHas('tugas', ['judul' => 'Kerjakan laporan PPD']);
    }

    public function test_gagal_menambah_tugas_tanpa_judul(): void
    {
        $response = $this->post(route('tugas.store'), [
            'deadline' => now()->addDays(1)->format('Y-m-d'),
            'prioritas' => 'sedang',
        ]);

        $response->assertSessionHasErrors('judul');
    }

    public function test_gagal_menambah_tugas_dengan_deadline_yang_sudah_lewat(): void
    {
        $response = $this->post(route('tugas.store'), [
            'judul' => 'Tugas telat',
            'deadline' => now()->subDays(1)->format('Y-m-d'),
            'prioritas' => 'sedang',
        ]);

        $response->assertSessionHasErrors('deadline');
    }

    public function test_user_bisa_toggle_status_selesai(): void
    {
        $tugas = Tugas::factory()->create(['selesai' => false]);

        $response = $this->put(route('tugas.update', $tugas));

        $response->assertRedirect(route('tugas.index'));
        $this->assertTrue($tugas->fresh()->selesai);
    }
}