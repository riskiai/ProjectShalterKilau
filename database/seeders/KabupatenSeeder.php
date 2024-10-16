<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data kabupaten dan kota di Provinsi Aceh
        $kabupatenAceh = [
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH TENGGARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH BESAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. PIDIE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. SIMEULUE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH SINGKIL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. BIREUEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH BARAT DAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. GAYO LUES', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. NAGAN RAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. ACEH TAMIANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. BENER MERIAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'KAB. PIDIE JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'KOTA BANDA ACEH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'KOTA SABANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'KOTA LHOKSEUMAWE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'KOTA LANGSA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'KOTA SUBULUSSALAM', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sumatera Utara
        $kabupatenSumut = [
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. TAPANULI TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. TAPANULI UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. TAPANULI SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. NIAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. LANGKAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. KARO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. DELI SERDANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. SIMALUNGUN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. ASAHAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. LABUHANBATU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. DAIRI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. TOBA SAMOSIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. MANDAILING NATAL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. NIAS SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. PAKPAK BHARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. HUMBANG HASUNDUTAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. SAMOSIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. SERDANG BEDAGAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. BATU BARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. PADANG LAWAS UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. PADANG LAWAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. LABUHANBATU SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. LABUHANBATU UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. NIAS UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'KAB. NIAS BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA MEDAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA PEMATANGSIANTAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA SIBOLGA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA TANJUNG BALAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA BINJAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA TEBING TINGGI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA PADANGSIDIMPUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 2, 'nama' => 'KOTA GUNUNGSITOLI', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sumatera Barat
        $kabupatenSumbar = [
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. PESISIR SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. SOLOK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. SIJUNJUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. TANAH DATAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. PADANG PARIAMAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. AGAM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. LIMA PULUH KOTA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. PASAMAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN MENTAWAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. DHARMASRAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. SOLOK SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 1, 'nama' => 'KAB. PASAMAN BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA PADANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA SOLOK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA SAWAHLUNTO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA PADANG PANJANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA BUKITTINGGI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA PAYAKUMBUH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 3, 'id_jenis' => 2, 'nama' => 'KOTA PARIAMAN', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Riau
        $kabupatenRiau = [
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. KAMPAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. INDRAGIRI HULU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. BENGKALIS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. INDRAGIRI HILIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. PELALAWAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. ROKAN HULU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. ROKAN HILIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. SIAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. KUANTAN SINGINGI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN MERANTI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 2, 'nama' => 'KOTA PEKANBARU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 4, 'id_jenis' => 2, 'nama' => 'KOTA DUMAI', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Jambi
        $kabupatenJambi = [
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. KERINCI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. MERANGIN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. SAROLANGUN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. BATANGHARI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. MUARO JAMBI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. TANJUNG JABUNG BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. TANJUNG JABUNG TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. BUNGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 1, 'nama' => 'KAB. TEBO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 2, 'nama' => 'KOTA JAMBI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 5, 'id_jenis' => 2, 'nama' => 'KOTA SUNGAI PENUH', 'created_at' => now(), 'updated_at' => now()],
        ];

       // Masukkan data kabupaten dan kota di Provinsi Sumatera Selatan
        $kabupatenSumsel = [
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. OGAN KOMERING ULU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. OGAN KOMERING ILIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. MUARA ENIM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. LAHAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. MUSI RAWAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. MUSI BANYUASIN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. BANYUASIN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. OGAN KOMERING ULU TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. OGAN KOMERING ULU SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. OGAN ILIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. EMPAT LAWANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. PENUKAL ABAB LEMATANG ILIR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 1, 'nama' => 'KAB. MUSI RAWAS UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 2, 'nama' => 'KOTA PALEMBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 2, 'nama' => 'KOTA PAGAR ALAM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 2, 'nama' => 'KOTA LUBUK LINGGAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 6, 'id_jenis' => 2, 'nama' => 'KOTA PRABUMULIH', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Bengkulu
        $kabupatenBengkulu = [
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. BENGKULU SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. REJANG LEBONG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. BENGKULU UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. KAUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. SELUMA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. MUKO MUKO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. LEBONG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. KEPAHIANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 1, 'nama' => 'KAB. BENGKULU TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 7, 'id_jenis' => 2, 'nama' => 'KOTA BENGKULU', 'created_at' => now(), 'updated_at' => now()],
        ];

       // Masukkan data kabupaten dan kota di Provinsi Lampung
        $kabupatenLampung = [
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. LAMPUNG SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. LAMPUNG TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. LAMPUNG UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. LAMPUNG BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. TULANG BAWANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. TANGGAMUS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. LAMPUNG TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. WAY KANAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. PESAWARAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. PRINGSEWU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. MESUJI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. TULANG BAWANG BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 1, 'nama' => 'KAB. PESISIR BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 2, 'nama' => 'KOTA BANDAR LAMPUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 8, 'id_jenis' => 2, 'nama' => 'KOTA METRO', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kepulauan Bangka Belitung
        $kabupatenBabel = [
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BANGKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BELITUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BANGKA SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BANGKA TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BANGKA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 1, 'nama' => 'KAB. BELITUNG TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 9, 'id_jenis' => 2, 'nama' => 'KOTA PANGKAL PINANG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kepulauan Riau
        $kabupatenKepri = [
            ['id_prov' => 10, 'id_jenis' => 1, 'nama' => 'KAB. BINTAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 1, 'nama' => 'KAB. KARIMUN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 1, 'nama' => 'KAB. NATUNA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 1, 'nama' => 'KAB. LINGGA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN ANAMBAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 2, 'nama' => 'KOTA BATAM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 10, 'id_jenis' => 2, 'nama' => 'KOTA TANJUNG PINANG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi DKI Jakarta
        $kabupatenJakarta = [
            ['id_prov' => 11, 'id_jenis' => 1, 'nama' => 'KAB. ADM. KEP. SERIBU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 11, 'id_jenis' => 2, 'nama' => 'KOTA ADM. JAKARTA PUSAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 11, 'id_jenis' => 2, 'nama' => 'KOTA ADM. JAKARTA UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 11, 'id_jenis' => 2, 'nama' => 'KOTA ADM. JAKARTA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 11, 'id_jenis' => 2, 'nama' => 'KOTA ADM. JAKARTA SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 11, 'id_jenis' => 2, 'nama' => 'KOTA ADM. JAKARTA TIMUR', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Jawa Barat
        $kabupatenJabar = [
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. BOGOR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. SUKABUMI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. CIANJUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. BANDUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. GARUT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. TASIKMALAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. CIAMIS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. KUNINGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. CIREBON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. MAJALENGKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. SUMEDANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. INDRAMAYU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. SUBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. PURWAKARTA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. KARAWANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. BEKASI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. BANDUNG BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 1, 'nama' => 'KAB. PANGANDARAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA BOGOR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA SUKABUMI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA BANDUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA CIREBON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA BEKASI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA DEPOK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA CIMAHI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA TASIKMALAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 12, 'id_jenis' => 2, 'nama' => 'KOTA BANJAR', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Jawa Tengah
        $kabupatenJateng = [
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. CILACAP', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BANYUMAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. PURBALINGGA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BANJARNEGARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. KEBUMEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. PURWOREJO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. WONOSOBO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. MAGELANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BOYOLALI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. KLATEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. SUKOHARJO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. WONOGIRI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. KARANGANYAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. SRAGEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. GROBOGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BLORA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. REMBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. PATI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. KUDUS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. JEPARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. DEMAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. SEMARANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. TEMANGGUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. KENDAL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BATANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. PEKALONGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. PEMALANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. TEGAL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 1, 'nama' => 'KAB. BREBES', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA MAGELANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA SURAKARTA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA SALATIGA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA SEMARANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA PEKALONGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 13, 'id_jenis' => 2, 'nama' => 'KOTA TEGAL', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi DI Yogyakarta
        $kabupatenDIY = [
            ['id_prov' => 14, 'id_jenis' => 1, 'nama' => 'KAB. KULON PROGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 14, 'id_jenis' => 1, 'nama' => 'KAB. BANTUL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 14, 'id_jenis' => 1, 'nama' => 'KAB. GUNUNGKIDUL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 14, 'id_jenis' => 1, 'nama' => 'KAB. SLEMAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 14, 'id_jenis' => 2, 'nama' => 'KOTA YOGYAKARTA', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Jawa Timur
        $kabupatenJatim = [
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. PACITAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. PONOROGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. TRENGGALEK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. TULUNGAGUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. BLITAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. KEDIRI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. MALANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. LUMAJANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. JEMBER', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. BANYUWANGI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. BONDOWOSO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. SITUBONDO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. PROBOLINGGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. PASURUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. SIDOARJO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. MOJOKERTO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. JOMBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. NGANJUK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. MADIUN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. MAGETAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. NGAWI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. BOJONEGORO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. TUBAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. LAMONGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. GRESIK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. BANGKALAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. SAMPANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. PAMEKASAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 1, 'nama' => 'KAB. SUMENEP', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA KEDIRI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA BLITAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA MALANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA PROBOLINGGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA PASURUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA MOJOKERTO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA MADIUN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA SURABAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 15, 'id_jenis' => 2, 'nama' => 'KOTA BATU', 'created_at' => now(), 'updated_at' => now()],
        ];

       // Masukkan data kabupaten dan kota di Provinsi Banten
        $kabupatenBanten = [
            ['id_prov' => 16, 'id_jenis' => 1, 'nama' => 'KAB. PANDEGLANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 1, 'nama' => 'KAB. LEBAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 1, 'nama' => 'KAB. TANGERANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 1, 'nama' => 'KAB. SERANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 2, 'nama' => 'KOTA TANGERANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 2, 'nama' => 'KOTA CILEGON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 2, 'nama' => 'KOTA SERANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 16, 'id_jenis' => 2, 'nama' => 'KOTA TANGERANG SELATAN', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Bali
        $kabupatenBali = [
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. JEMBRANA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. TABANAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. BADUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. GIANYAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. KLUNGKUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. BANGLI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. KARANGASEM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 1, 'nama' => 'KAB. BULELENG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 17, 'id_jenis' => 2, 'nama' => 'KOTA DENPASAR', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Nusa Tenggara Barat (NTB)
        $kabupatenNTB = [
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. LOMBOK BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. LOMBOK TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. LOMBOK TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. SUMBAWA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. DOMPU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. BIMA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. SUMBAWA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 1, 'nama' => 'KAB. LOMBOK UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 2, 'nama' => 'KOTA MATARAM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 18, 'id_jenis' => 2, 'nama' => 'KOTA BIMA', 'created_at' => now(), 'updated_at' => now()],
        ];

       // Masukkan data kabupaten dan kota di Provinsi Nusa Tenggara Timur (NTT)
        $kabupatenNTT = [
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. KUPANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB TIMOR TENGAH SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. TIMOR TENGAH UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. BELU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. ALOR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. FLORES TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SIKKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. ENDE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. NGADA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. MANGGARAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SUMBA TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SUMBA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. LEMBATA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. ROTE NDAO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. MANGGARAI BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. NAGEKEO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SUMBA TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SUMBA BARAT DAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. MANGGARAI TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. SABU RAIJUA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 1, 'nama' => 'KAB. MALAKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 19, 'id_jenis' => 2, 'nama' => 'KOTA KUPANG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kalimantan Barat
        $kabupatenKalbar = [
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. SAMBAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. MEMPAWAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. SANGGAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. KETAPANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. SINTANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. KAPUAS HULU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. BENGKAYANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. LANDAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. SEKADAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. MELAWI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. KAYONG UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 1, 'nama' => 'KAB. KUBU RAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 2, 'nama' => 'KOTA PONTIANAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 20, 'id_jenis' => 2, 'nama' => 'KOTA SINGKAWANG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kalimantan Tengah
        $kabupatenKalteng = [
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. KOTAWARINGIN BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. KOTAWARINGIN TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. KAPUAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. BARITO SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. BARITO UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. KATINGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. SERUYAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. SUKAMARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. LAMANDAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. GUNUNG MAS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. PULANG PISAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. MURUNG RAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 1, 'nama' => 'KAB. BARITO TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 21, 'id_jenis' => 2, 'nama' => 'KOTA PALANGKARAYA', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kalimantan Selatan
        $kabupatenKalsel = [
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. TANAH LAUT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. KOTABARU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. BANJAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. BARITO KUALA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. TAPIN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. HULU SUNGAI SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. HULU SUNGAI TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. HULU SUNGAI UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. TABALONG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. TANAH BUMBU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 1, 'nama' => 'KAB. BALANGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 2, 'nama' => 'KOTA BANJARMASIN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 22, 'id_jenis' => 2, 'nama' => 'KOTA BANJARBARU', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kalimantan Timur
        $kabupatenKaltim = [
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. PASER', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. KUTAI KARTANEGARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. BERAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. KUTAI BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. KUTAI TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. PENAJAM PASER UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 1, 'nama' => 'KAB. MAHAKAM ULU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 2, 'nama' => 'KOTA BALIKPAPAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 2, 'nama' => 'KOTA SAMARINDA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 23, 'id_jenis' => 2, 'nama' => 'KOTA BONTANG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Kalimantan Utara
        $kabupatenKaltara = [
            ['id_prov' => 24, 'id_jenis' => 1, 'nama' => 'KAB. BULUNGAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 24, 'id_jenis' => 1, 'nama' => 'KAB. MALINAU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 24, 'id_jenis' => 1, 'nama' => 'KAB. NUNUKAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 24, 'id_jenis' => 1, 'nama' => 'KAB. TANA TIDUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 24, 'id_jenis' => 2, 'nama' => 'KOTA TARAKAN', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sulawesi Utara
        $kabupatenSulut = [
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. BOLAANG MONGONDOW', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. MINAHASA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN SANGIHE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN TALAUD', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. MINAHASA SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. MINAHASA UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. MINAHASA TENGGARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. BOLAANG MONGONDOW UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. KEP. SIAU TAGULANDANG BIARO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. BOLAANG MONGONDOW TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 1, 'nama' => 'KAB. BOLAANG MONGONDOW SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 2, 'nama' => 'KOTA MANADO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 2, 'nama' => 'KOTA BITUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 2, 'nama' => 'KOTA TOMOHON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 25, 'id_jenis' => 2, 'nama' => 'KOTA KOTAMOBAGU', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sulawesi Tengah
        $kabupatenSulteng = [
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. BANGGAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. POSO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. DONGGALA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. TOLI TOLI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. BUOL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. MOROWALI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. BANGGAI KEPULAUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. PARIGI MOUTONG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. TOJO UNA UNA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. SIGI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. BANGGAI LAUT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 1, 'nama' => 'KAB. MOROWALI UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 26, 'id_jenis' => 2, 'nama' => 'KOTA PALU', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sulawesi Selatan
        $kabupatenSulsel = [
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN SELAYAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. BULUKUMBA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. BANTAENG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. JENEPONTO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. TAKALAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. GOWA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. SINJAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. BONE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. MAROS', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. PANGKAJENE KEPULAUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. BARRU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. SOPPENG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. WAJO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. SIDENRENG RAPPANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. PINRANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. ENREKANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. LUWU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. TANA TORAJA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. LUWU UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. LUWU TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 1, 'nama' => 'KAB. TORAJA UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 2, 'nama' => 'KOTA MAKASSAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 2, 'nama' => 'KOTA PARE PARE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 27, 'id_jenis' => 2, 'nama' => 'KOTA PALOPO', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sulawesi Tenggara
        $kabupatenSultenggara = [
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KOLAKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KONAWE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. MUNA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. BUTON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KONAWE SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. BOMBANA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. WAKATOBI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KOLAKA UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KONAWE UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. BUTON UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KOLAKA TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. KONAWE KEPULAUAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. MUNA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. BUTON TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 1, 'nama' => 'KAB. BUTON SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 2, 'nama' => 'KOTA KENDARI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 28, 'id_jenis' => 2, 'nama' => 'KOTA BAU BAU', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Gorontalo
        $kabupatenGorontalo = [
            ['id_prov' => 29, 'id_jenis' => 1, 'nama' => 'KAB. GORONTALO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 29, 'id_jenis' => 1, 'nama' => 'KAB. BOALEMO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 29, 'id_jenis' => 1, 'nama' => 'KAB. BONE BOLANGO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 29, 'id_jenis' => 1, 'nama' => 'KAB. PAHUWATO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 29, 'id_jenis' => 1, 'nama' => 'KAB. GORONTALO UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 29, 'id_jenis' => 2, 'nama' => 'KOTA GORONTALO', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Sulawesi Barat
        $kabupatenSulbar = [
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. MAMUJU UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. MAMUJU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. MAMASA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. POLEWALI MANDAR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. MAJENE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 30, 'id_jenis' => 1, 'nama' => 'KAB. MAMUJU TENGAH', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Maluku
        $kabupatenMaluku = [
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. MALUKU TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. MALUKU TENGGARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. MALUKU TENGGARA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. BURU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. SERAM BAGIAN TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. SERAM BAGIAN BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN ARU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. MALUKU BARAT DAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 1, 'nama' => 'KAB. BURU SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 2, 'nama' => 'KOTA AMBON', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 31, 'id_jenis' => 2, 'nama' => 'KOTA TUAL', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Maluku Utara
        $kabupatenMalukuUtara = [
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. HALMAHERA BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. HALMAHERA TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. HALMAHERA UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. HALMAHERA SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN SULA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. HALMAHERA TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. PULAU MOROTAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 1, 'nama' => 'KAB. PULAU TALIABU', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 2, 'nama' => 'KOTA TERNATE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 32, 'id_jenis' => 2, 'nama' => 'KOTA TIDORE KEPULAUAN', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Papua
        $kabupatenPapua = [
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. MERAUKE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. JAYAWIJAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. JAYAPURA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. NABIRE', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. KEPULAUAN YAPEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. BIAK NUMFOR', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. PUNCAK JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. PANIAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. MIMIKA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. SARMI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. KEEROM', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. PEGUNUNGAN BINTANG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. YAHUKIMO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. TOLIKARA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. WAROPEN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. BOVEN DIGOEL', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. MAPPI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. ASMAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. SUPIORI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. MAMBERAMO RAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. MAMBERAMO TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. YALIMO', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. LANNY JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. NDUGA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. PUNCAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. DOGIYAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. INTAN JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 1, 'nama' => 'KAB. DEIYAI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 33, 'id_jenis' => 2, 'nama' => 'KOTA JAYAPURA', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data kabupaten dan kota di Provinsi Papua Barat
        $kabupatenPapuaBarat = [
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. SORONG', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. MANOKWARI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. FAK FAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. SORONG SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. RAJA AMPAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. TELUK BINTUNI', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. TELUK WONDAMA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. KAIMANA', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. TAMBRAUW', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. MAYBRAT', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. MANOKWARI SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 1, 'nama' => 'KAB. PEGUNUNGAN ARFAK', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 34, 'id_jenis' => 2, 'nama' => 'KOTA SORONG', 'created_at' => now(), 'updated_at' => now()],
        ];

        // 

        // Menggabungkan semua data ke dalam satu variabel
        $kabupatenKota = array_merge($kabupatenAceh, $kabupatenSumut, $kabupatenSumbar, $kabupatenRiau, $kabupatenJambi, $kabupatenSumsel, $kabupatenBengkulu, $kabupatenLampung, $kabupatenBabel, $kabupatenKepri, $kabupatenJakarta, $kabupatenJabar, $kabupatenJateng, $kabupatenDIY, $kabupatenJatim, $kabupatenBanten, $kabupatenBali, $kabupatenNTB, $kabupatenNTT, $kabupatenKalbar, $kabupatenKalteng, $kabupatenKalsel, $kabupatenKaltim, $kabupatenKaltara, $kabupatenKaltim, $kabupatenSulut, $kabupatenSulteng, $kabupatenSulsel, $kabupatenSultenggara, $kabupatenGorontalo, $kabupatenSulbar, $kabupatenMaluku, $kabupatenMalukuUtara, $kabupatenPapua, $kabupatenPapuaBarat);

        // Insert data ke tabel kabupaten
        DB::table('kabupaten')->insert($kabupatenKota);

    }
}
