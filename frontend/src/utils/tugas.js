export function hitungTugasBelumSelesai(daftarTugas) {
  return daftarTugas.filter((t) => !t.selesai).length
}

export function urutkanBerdasarkanDeadline(daftarTugas) {
  return [...daftarTugas].sort((a, b) => new Date(a.deadline) - new Date(b.deadline))
}