import { describe, it, expect } from 'vitest'
import { hitungTugasBelumSelesai, urutkanBerdasarkanDeadline } from '../utils/tugas'

describe('hitungTugasBelumSelesai', () => {
  it('menghitung jumlah tugas yang belum selesai dengan benar', () => {
    const data = [
      { id: 1, selesai: false },
      { id: 2, selesai: true },
      { id: 3, selesai: false },
    ]
    expect(hitungTugasBelumSelesai(data)).toBe(2)
  })
})

describe('urutkanBerdasarkanDeadline', () => {
  it('mengurutkan tugas dari deadline paling dekat', () => {
    const data = [
      { id: 1, deadline: '2026-12-01' },
      { id: 2, deadline: '2026-10-01' },
      { id: 3, deadline: '2026-11-01' },
    ]
    const hasil = urutkanBerdasarkanDeadline(data)
    expect(hasil[0].id).toBe(2)
    expect(hasil[2].id).toBe(1)
  })
})