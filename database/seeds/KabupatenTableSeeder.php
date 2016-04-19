<?php

use Illuminate\Database\Seeder;

class KabupatenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kabupaten')->delete();
        
        \DB::table('kabupaten')->insert(array (
            0 => 
            array (
                'id' => '1101',
                'id_prov' => '11',
                'nama' => 'Kab. Simeulue',
            ),
            1 => 
            array (
                'id' => '1102',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Singkil',
            ),
            2 => 
            array (
                'id' => '1103',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Selatan',
            ),
            3 => 
            array (
                'id' => '1104',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Tenggara',
            ),
            4 => 
            array (
                'id' => '1105',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Timur',
            ),
            5 => 
            array (
                'id' => '1106',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Tengah',
            ),
            6 => 
            array (
                'id' => '1107',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Barat',
            ),
            7 => 
            array (
                'id' => '1108',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Besar',
            ),
            8 => 
            array (
                'id' => '1109',
                'id_prov' => '11',
                'nama' => 'Kab. Pidie',
            ),
            9 => 
            array (
                'id' => '1110',
                'id_prov' => '11',
                'nama' => 'Kab. Bireuen',
            ),
            10 => 
            array (
                'id' => '1111',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Utara',
            ),
            11 => 
            array (
                'id' => '1112',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Barat Daya',
            ),
            12 => 
            array (
                'id' => '1113',
                'id_prov' => '11',
                'nama' => 'Kab. Gayo Lues',
            ),
            13 => 
            array (
                'id' => '1114',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Tamiang',
            ),
            14 => 
            array (
                'id' => '1115',
                'id_prov' => '11',
                'nama' => 'Kab. Nagan Raya',
            ),
            15 => 
            array (
                'id' => '1116',
                'id_prov' => '11',
                'nama' => 'Kab. Aceh Jaya',
            ),
            16 => 
            array (
                'id' => '1117',
                'id_prov' => '11',
                'nama' => 'Kab. Bener Meriah',
            ),
            17 => 
            array (
                'id' => '1118',
                'id_prov' => '11',
                'nama' => 'Kab. Pidie Jaya',
            ),
            18 => 
            array (
                'id' => '1171',
                'id_prov' => '11',
                'nama' => 'Kota Banda Aceh',
            ),
            19 => 
            array (
                'id' => '1172',
                'id_prov' => '11',
                'nama' => 'Kota Sabang',
            ),
            20 => 
            array (
                'id' => '1173',
                'id_prov' => '11',
                'nama' => 'Kota Langsa',
            ),
            21 => 
            array (
                'id' => '1174',
                'id_prov' => '11',
                'nama' => 'Kota Lhokseumawe',
            ),
            22 => 
            array (
                'id' => '1175',
                'id_prov' => '11',
                'nama' => 'Kota Subulussalam',
            ),
            23 => 
            array (
                'id' => '1201',
                'id_prov' => '12',
                'nama' => 'Kab. Nias',
            ),
            24 => 
            array (
                'id' => '1202',
                'id_prov' => '12',
                'nama' => 'Kab. Mandailing Natal',
            ),
            25 => 
            array (
                'id' => '1203',
                'id_prov' => '12',
                'nama' => 'Kab. Tapanuli Selatan',
            ),
            26 => 
            array (
                'id' => '1204',
                'id_prov' => '12',
                'nama' => 'Kab. Tapanuli Tengah',
            ),
            27 => 
            array (
                'id' => '1205',
                'id_prov' => '12',
                'nama' => 'Kab. Tapanuli Utara',
            ),
            28 => 
            array (
                'id' => '1206',
                'id_prov' => '12',
                'nama' => 'Kab. Toba Samosir',
            ),
            29 => 
            array (
                'id' => '1207',
                'id_prov' => '12',
                'nama' => 'Kab. Labuhan Batu',
            ),
            30 => 
            array (
                'id' => '1208',
                'id_prov' => '12',
                'nama' => 'Kab. Asahan',
            ),
            31 => 
            array (
                'id' => '1209',
                'id_prov' => '12',
                'nama' => 'Kab. Simalungun',
            ),
            32 => 
            array (
                'id' => '1210',
                'id_prov' => '12',
                'nama' => 'Kab. Dairi',
            ),
            33 => 
            array (
                'id' => '1211',
                'id_prov' => '12',
                'nama' => 'Kab. Karo',
            ),
            34 => 
            array (
                'id' => '1212',
                'id_prov' => '12',
                'nama' => 'Kab. Deli Serdang',
            ),
            35 => 
            array (
                'id' => '1213',
                'id_prov' => '12',
                'nama' => 'Kab. Langkat',
            ),
            36 => 
            array (
                'id' => '1214',
                'id_prov' => '12',
                'nama' => 'Kab. Nias Selatan',
            ),
            37 => 
            array (
                'id' => '1215',
                'id_prov' => '12',
                'nama' => 'Kab. Humbang Hasundutan',
            ),
            38 => 
            array (
                'id' => '1216',
                'id_prov' => '12',
                'nama' => 'Kab. Pakpak Bharat',
            ),
            39 => 
            array (
                'id' => '1217',
                'id_prov' => '12',
                'nama' => 'Kab. Samosir',
            ),
            40 => 
            array (
                'id' => '1218',
                'id_prov' => '12',
                'nama' => 'Kab. Serdang Bedagai',
            ),
            41 => 
            array (
                'id' => '1219',
                'id_prov' => '12',
                'nama' => 'Kab. Batu Bara',
            ),
            42 => 
            array (
                'id' => '1220',
                'id_prov' => '12',
                'nama' => 'Kab. Padang Lawas Utara',
            ),
            43 => 
            array (
                'id' => '1221',
                'id_prov' => '12',
                'nama' => 'Kab. Padang Lawas',
            ),
            44 => 
            array (
                'id' => '1222',
                'id_prov' => '12',
                'nama' => 'Kab. Labuhan Batu Selatan',
            ),
            45 => 
            array (
                'id' => '1223',
                'id_prov' => '12',
                'nama' => 'Kab. Labuhan Batu Utara',
            ),
            46 => 
            array (
                'id' => '1224',
                'id_prov' => '12',
                'nama' => 'Kab. Nias Utara',
            ),
            47 => 
            array (
                'id' => '1225',
                'id_prov' => '12',
                'nama' => 'Kab. Nias Barat',
            ),
            48 => 
            array (
                'id' => '1271',
                'id_prov' => '12',
                'nama' => 'Kota Sibolga',
            ),
            49 => 
            array (
                'id' => '1272',
                'id_prov' => '12',
                'nama' => 'Kota Tanjung Balai',
            ),
            50 => 
            array (
                'id' => '1273',
                'id_prov' => '12',
                'nama' => 'Kota Pematang Siantar',
            ),
            51 => 
            array (
                'id' => '1274',
                'id_prov' => '12',
                'nama' => 'Kota Tebing Tinggi',
            ),
            52 => 
            array (
                'id' => '1275',
                'id_prov' => '12',
                'nama' => 'Kota Medan',
            ),
            53 => 
            array (
                'id' => '1276',
                'id_prov' => '12',
                'nama' => 'Kota Binjai',
            ),
            54 => 
            array (
                'id' => '1277',
                'id_prov' => '12',
                'nama' => 'Kota Padangsidimpuan',
            ),
            55 => 
            array (
                'id' => '1278',
                'id_prov' => '12',
                'nama' => 'Kota Gunungsitoli',
            ),
            56 => 
            array (
                'id' => '1301',
                'id_prov' => '13',
                'nama' => 'Kab. Kepulauan Mentawai',
            ),
            57 => 
            array (
                'id' => '1302',
                'id_prov' => '13',
                'nama' => 'Kab. Pesisir Selatan',
            ),
            58 => 
            array (
                'id' => '1303',
                'id_prov' => '13',
                'nama' => 'Kab. Solok',
            ),
            59 => 
            array (
                'id' => '1304',
                'id_prov' => '13',
                'nama' => 'Kab. Sijunjung',
            ),
            60 => 
            array (
                'id' => '1305',
                'id_prov' => '13',
                'nama' => 'Kab. Tanah Datar',
            ),
            61 => 
            array (
                'id' => '1306',
                'id_prov' => '13',
                'nama' => 'Kab. Padang Pariaman',
            ),
            62 => 
            array (
                'id' => '1307',
                'id_prov' => '13',
                'nama' => 'Kab. Agam',
            ),
            63 => 
            array (
                'id' => '1308',
                'id_prov' => '13',
                'nama' => 'Kab. Lima Puluh Kota',
            ),
            64 => 
            array (
                'id' => '1309',
                'id_prov' => '13',
                'nama' => 'Kab. Pasaman',
            ),
            65 => 
            array (
                'id' => '1310',
                'id_prov' => '13',
                'nama' => 'Kab. Solok Selatan',
            ),
            66 => 
            array (
                'id' => '1311',
                'id_prov' => '13',
                'nama' => 'Kab. Dharmasraya',
            ),
            67 => 
            array (
                'id' => '1312',
                'id_prov' => '13',
                'nama' => 'Kab. Pasaman Barat',
            ),
            68 => 
            array (
                'id' => '1371',
                'id_prov' => '13',
                'nama' => 'Kota Padang',
            ),
            69 => 
            array (
                'id' => '1372',
                'id_prov' => '13',
                'nama' => 'Kota Solok',
            ),
            70 => 
            array (
                'id' => '1373',
                'id_prov' => '13',
                'nama' => 'Kota Sawah Lunto',
            ),
            71 => 
            array (
                'id' => '1374',
                'id_prov' => '13',
                'nama' => 'Kota Padang Panjang',
            ),
            72 => 
            array (
                'id' => '1375',
                'id_prov' => '13',
                'nama' => 'Kota Bukittinggi',
            ),
            73 => 
            array (
                'id' => '1376',
                'id_prov' => '13',
                'nama' => 'Kota Payakumbuh',
            ),
            74 => 
            array (
                'id' => '1377',
                'id_prov' => '13',
                'nama' => 'Kota Pariaman',
            ),
            75 => 
            array (
                'id' => '1401',
                'id_prov' => '14',
                'nama' => 'Kab. Kuantan Singingi',
            ),
            76 => 
            array (
                'id' => '1402',
                'id_prov' => '14',
                'nama' => 'Kab. Indragiri Hulu',
            ),
            77 => 
            array (
                'id' => '1403',
                'id_prov' => '14',
                'nama' => 'Kab. Indragiri Hilir',
            ),
            78 => 
            array (
                'id' => '1404',
                'id_prov' => '14',
                'nama' => 'Kab. Pelalawan',
            ),
            79 => 
            array (
                'id' => '1405',
                'id_prov' => '14',
                'nama' => 'Kab. S I A K',
            ),
            80 => 
            array (
                'id' => '1406',
                'id_prov' => '14',
                'nama' => 'Kab. Kampar',
            ),
            81 => 
            array (
                'id' => '1407',
                'id_prov' => '14',
                'nama' => 'Kab. Rokan Hulu',
            ),
            82 => 
            array (
                'id' => '1408',
                'id_prov' => '14',
                'nama' => 'Kab. Bengkalis',
            ),
            83 => 
            array (
                'id' => '1409',
                'id_prov' => '14',
                'nama' => 'Kab. Rokan Hilir',
            ),
            84 => 
            array (
                'id' => '1410',
                'id_prov' => '14',
                'nama' => 'Kab. Kepulauan Meranti',
            ),
            85 => 
            array (
                'id' => '1471',
                'id_prov' => '14',
                'nama' => 'Kota Pekanbaru',
            ),
            86 => 
            array (
                'id' => '1473',
                'id_prov' => '14',
                'nama' => 'Kota D U M A I',
            ),
            87 => 
            array (
                'id' => '1501',
                'id_prov' => '15',
                'nama' => 'Kab. Kerinci',
            ),
            88 => 
            array (
                'id' => '1502',
                'id_prov' => '15',
                'nama' => 'Kab. Merangin',
            ),
            89 => 
            array (
                'id' => '1503',
                'id_prov' => '15',
                'nama' => 'Kab. Sarolangun',
            ),
            90 => 
            array (
                'id' => '1504',
                'id_prov' => '15',
                'nama' => 'Kab. Batang Hari',
            ),
            91 => 
            array (
                'id' => '1505',
                'id_prov' => '15',
                'nama' => 'Kab. Muaro Jambi',
            ),
            92 => 
            array (
                'id' => '1506',
                'id_prov' => '15',
                'nama' => 'Kab. Tanjung Jabung Timur',
            ),
            93 => 
            array (
                'id' => '1507',
                'id_prov' => '15',
                'nama' => 'Kab. Tanjung Jabung Barat',
            ),
            94 => 
            array (
                'id' => '1508',
                'id_prov' => '15',
                'nama' => 'Kab. Tebo',
            ),
            95 => 
            array (
                'id' => '1509',
                'id_prov' => '15',
                'nama' => 'Kab. Bungo',
            ),
            96 => 
            array (
                'id' => '1571',
                'id_prov' => '15',
                'nama' => 'Kota Jambi',
            ),
            97 => 
            array (
                'id' => '1572',
                'id_prov' => '15',
                'nama' => 'Kota Sungai Penuh',
            ),
            98 => 
            array (
                'id' => '1601',
                'id_prov' => '16',
                'nama' => 'Kab. Ogan Komering Ulu',
            ),
            99 => 
            array (
                'id' => '1602',
                'id_prov' => '16',
                'nama' => 'Kab. Ogan Komering Ilir',
            ),
            100 => 
            array (
                'id' => '1603',
                'id_prov' => '16',
                'nama' => 'Kab. Muara Enim',
            ),
            101 => 
            array (
                'id' => '1604',
                'id_prov' => '16',
                'nama' => 'Kab. Lahat',
            ),
            102 => 
            array (
                'id' => '1605',
                'id_prov' => '16',
                'nama' => 'Kab. Musi Rawas',
            ),
            103 => 
            array (
                'id' => '1606',
                'id_prov' => '16',
                'nama' => 'Kab. Musi Banyuasin',
            ),
            104 => 
            array (
                'id' => '1607',
                'id_prov' => '16',
                'nama' => 'Kab. Banyu Asin',
            ),
            105 => 
            array (
                'id' => '1608',
                'id_prov' => '16',
                'nama' => 'Kab. Ogan Komering Ulu Selatan',
            ),
            106 => 
            array (
                'id' => '1609',
                'id_prov' => '16',
                'nama' => 'Kab. Ogan Komering Ulu Timur',
            ),
            107 => 
            array (
                'id' => '1610',
                'id_prov' => '16',
                'nama' => 'Kab. Ogan Ilir',
            ),
            108 => 
            array (
                'id' => '1611',
                'id_prov' => '16',
                'nama' => 'Kab. Empat Lawang',
            ),
            109 => 
            array (
                'id' => '1671',
                'id_prov' => '16',
                'nama' => 'Kota Palembang',
            ),
            110 => 
            array (
                'id' => '1672',
                'id_prov' => '16',
                'nama' => 'Kota Prabumulih',
            ),
            111 => 
            array (
                'id' => '1673',
                'id_prov' => '16',
                'nama' => 'Kota Pagar Alam',
            ),
            112 => 
            array (
                'id' => '1674',
                'id_prov' => '16',
                'nama' => 'Kota Lubuklinggau',
            ),
            113 => 
            array (
                'id' => '1701',
                'id_prov' => '17',
                'nama' => 'Kab. Bengkulu Selatan',
            ),
            114 => 
            array (
                'id' => '1702',
                'id_prov' => '17',
                'nama' => 'Kab. Rejang Lebong',
            ),
            115 => 
            array (
                'id' => '1703',
                'id_prov' => '17',
                'nama' => 'Kab. Bengkulu Utara',
            ),
            116 => 
            array (
                'id' => '1704',
                'id_prov' => '17',
                'nama' => 'Kab. Kaur',
            ),
            117 => 
            array (
                'id' => '1705',
                'id_prov' => '17',
                'nama' => 'Kab. Seluma',
            ),
            118 => 
            array (
                'id' => '1706',
                'id_prov' => '17',
                'nama' => 'Kab. Mukomuko',
            ),
            119 => 
            array (
                'id' => '1707',
                'id_prov' => '17',
                'nama' => 'Kab. Lebong',
            ),
            120 => 
            array (
                'id' => '1708',
                'id_prov' => '17',
                'nama' => 'Kab. Kepahiang',
            ),
            121 => 
            array (
                'id' => '1709',
                'id_prov' => '17',
                'nama' => 'Kab. Bengkulu Tengah',
            ),
            122 => 
            array (
                'id' => '1771',
                'id_prov' => '17',
                'nama' => 'Kota Bengkulu',
            ),
            123 => 
            array (
                'id' => '1801',
                'id_prov' => '18',
                'nama' => 'Kab. Lampung Barat',
            ),
            124 => 
            array (
                'id' => '1802',
                'id_prov' => '18',
                'nama' => 'Kab. Tanggamus',
            ),
            125 => 
            array (
                'id' => '1803',
                'id_prov' => '18',
                'nama' => 'Kab. Lampung Selatan',
            ),
            126 => 
            array (
                'id' => '1804',
                'id_prov' => '18',
                'nama' => 'Kab. Lampung Timur',
            ),
            127 => 
            array (
                'id' => '1805',
                'id_prov' => '18',
                'nama' => 'Kab. Lampung Tengah',
            ),
            128 => 
            array (
                'id' => '1806',
                'id_prov' => '18',
                'nama' => 'Kab. Lampung Utara',
            ),
            129 => 
            array (
                'id' => '1807',
                'id_prov' => '18',
                'nama' => 'Kab. Way Kanan',
            ),
            130 => 
            array (
                'id' => '1808',
                'id_prov' => '18',
                'nama' => 'Kab. Tulangbawang',
            ),
            131 => 
            array (
                'id' => '1809',
                'id_prov' => '18',
                'nama' => 'Kab. Pesawaran',
            ),
            132 => 
            array (
                'id' => '1810',
                'id_prov' => '18',
                'nama' => 'Kab. Pringsewu',
            ),
            133 => 
            array (
                'id' => '1811',
                'id_prov' => '18',
                'nama' => 'Kab. Mesuji',
            ),
            134 => 
            array (
                'id' => '1812',
                'id_prov' => '18',
                'nama' => 'Kab. Tulang Bawang Barat',
            ),
            135 => 
            array (
                'id' => '1813',
                'id_prov' => '18',
                'nama' => 'Kab. Pesisir Barat',
            ),
            136 => 
            array (
                'id' => '1871',
                'id_prov' => '18',
                'nama' => 'Kota Bandar Lampung',
            ),
            137 => 
            array (
                'id' => '1872',
                'id_prov' => '18',
                'nama' => 'Kota Metro',
            ),
            138 => 
            array (
                'id' => '1901',
                'id_prov' => '19',
                'nama' => 'Kab. Bangka',
            ),
            139 => 
            array (
                'id' => '1902',
                'id_prov' => '19',
                'nama' => 'Kab. Belitung',
            ),
            140 => 
            array (
                'id' => '1903',
                'id_prov' => '19',
                'nama' => 'Kab. Bangka Barat',
            ),
            141 => 
            array (
                'id' => '1904',
                'id_prov' => '19',
                'nama' => 'Kab. Bangka Tengah',
            ),
            142 => 
            array (
                'id' => '1905',
                'id_prov' => '19',
                'nama' => 'Kab. Bangka Selatan',
            ),
            143 => 
            array (
                'id' => '1906',
                'id_prov' => '19',
                'nama' => 'Kab. Belitung Timur',
            ),
            144 => 
            array (
                'id' => '1971',
                'id_prov' => '19',
                'nama' => 'Kota Pangkal Pinang',
            ),
            145 => 
            array (
                'id' => '2101',
                'id_prov' => '21',
                'nama' => 'Kab. Karimun',
            ),
            146 => 
            array (
                'id' => '2102',
                'id_prov' => '21',
                'nama' => 'Kab. Bintan',
            ),
            147 => 
            array (
                'id' => '2103',
                'id_prov' => '21',
                'nama' => 'Kab. Natuna',
            ),
            148 => 
            array (
                'id' => '2104',
                'id_prov' => '21',
                'nama' => 'Kab. Lingga',
            ),
            149 => 
            array (
                'id' => '2105',
                'id_prov' => '21',
                'nama' => 'Kab. Kepulauan Anambas',
            ),
            150 => 
            array (
                'id' => '2171',
                'id_prov' => '21',
                'nama' => 'Kota B A T A M',
            ),
            151 => 
            array (
                'id' => '2172',
                'id_prov' => '21',
                'nama' => 'Kota Tanjung Pinang',
            ),
            152 => 
            array (
                'id' => '3101',
                'id_prov' => '31',
                'nama' => 'Kab. Kepulauan Seribu',
            ),
            153 => 
            array (
                'id' => '3171',
                'id_prov' => '31',
                'nama' => 'Kota Jakarta Selatan',
            ),
            154 => 
            array (
                'id' => '3172',
                'id_prov' => '31',
                'nama' => 'Kota Jakarta Timur',
            ),
            155 => 
            array (
                'id' => '3173',
                'id_prov' => '31',
                'nama' => 'Kota Jakarta Pusat',
            ),
            156 => 
            array (
                'id' => '3174',
                'id_prov' => '31',
                'nama' => 'Kota Jakarta Barat',
            ),
            157 => 
            array (
                'id' => '3175',
                'id_prov' => '31',
                'nama' => 'Kota Jakarta Utara',
            ),
            158 => 
            array (
                'id' => '3201',
                'id_prov' => '32',
                'nama' => 'Kab. Bogor',
            ),
            159 => 
            array (
                'id' => '3202',
                'id_prov' => '32',
                'nama' => 'Kab. Sukabumi',
            ),
            160 => 
            array (
                'id' => '3203',
                'id_prov' => '32',
                'nama' => 'Kab. Cianjur',
            ),
            161 => 
            array (
                'id' => '3204',
                'id_prov' => '32',
                'nama' => 'Kab. Bandung',
            ),
            162 => 
            array (
                'id' => '3205',
                'id_prov' => '32',
                'nama' => 'Kab. Garut',
            ),
            163 => 
            array (
                'id' => '3206',
                'id_prov' => '32',
                'nama' => 'Kab. Tasikmalaya',
            ),
            164 => 
            array (
                'id' => '3207',
                'id_prov' => '32',
                'nama' => 'Kab. Ciamis',
            ),
            165 => 
            array (
                'id' => '3208',
                'id_prov' => '32',
                'nama' => 'Kab. Kuningan',
            ),
            166 => 
            array (
                'id' => '3209',
                'id_prov' => '32',
                'nama' => 'Kab. Cirebon',
            ),
            167 => 
            array (
                'id' => '3210',
                'id_prov' => '32',
                'nama' => 'Kab. Majalengka',
            ),
            168 => 
            array (
                'id' => '3211',
                'id_prov' => '32',
                'nama' => 'Kab. Sumedang',
            ),
            169 => 
            array (
                'id' => '3212',
                'id_prov' => '32',
                'nama' => 'Kab. Indramayu',
            ),
            170 => 
            array (
                'id' => '3213',
                'id_prov' => '32',
                'nama' => 'Kab. Subang',
            ),
            171 => 
            array (
                'id' => '3214',
                'id_prov' => '32',
                'nama' => 'Kab. Purwakarta',
            ),
            172 => 
            array (
                'id' => '3215',
                'id_prov' => '32',
                'nama' => 'Kab. Karawang',
            ),
            173 => 
            array (
                'id' => '3216',
                'id_prov' => '32',
                'nama' => 'Kab. Bekasi',
            ),
            174 => 
            array (
                'id' => '3217',
                'id_prov' => '32',
                'nama' => 'Kab. Bandung Barat',
            ),
            175 => 
            array (
                'id' => '3218',
                'id_prov' => '32',
                'nama' => 'Kab. Pangandaran',
            ),
            176 => 
            array (
                'id' => '3271',
                'id_prov' => '32',
                'nama' => 'Kota Bogor',
            ),
            177 => 
            array (
                'id' => '3272',
                'id_prov' => '32',
                'nama' => 'Kota Sukabumi',
            ),
            178 => 
            array (
                'id' => '3273',
                'id_prov' => '32',
                'nama' => 'Kota Bandung',
            ),
            179 => 
            array (
                'id' => '3274',
                'id_prov' => '32',
                'nama' => 'Kota Cirebon',
            ),
            180 => 
            array (
                'id' => '3275',
                'id_prov' => '32',
                'nama' => 'Kota Bekasi',
            ),
            181 => 
            array (
                'id' => '3276',
                'id_prov' => '32',
                'nama' => 'Kota Depok',
            ),
            182 => 
            array (
                'id' => '3277',
                'id_prov' => '32',
                'nama' => 'Kota Cimahi',
            ),
            183 => 
            array (
                'id' => '3278',
                'id_prov' => '32',
                'nama' => 'Kota Tasikmalaya',
            ),
            184 => 
            array (
                'id' => '3279',
                'id_prov' => '32',
                'nama' => 'Kota Banjar',
            ),
            185 => 
            array (
                'id' => '3301',
                'id_prov' => '33',
                'nama' => 'Kab. Cilacap',
            ),
            186 => 
            array (
                'id' => '3302',
                'id_prov' => '33',
                'nama' => 'Kab. Banyumas',
            ),
            187 => 
            array (
                'id' => '3303',
                'id_prov' => '33',
                'nama' => 'Kab. Purbalingga',
            ),
            188 => 
            array (
                'id' => '3304',
                'id_prov' => '33',
                'nama' => 'Kab. Banjarnegara',
            ),
            189 => 
            array (
                'id' => '3305',
                'id_prov' => '33',
                'nama' => 'Kab. Kebumen',
            ),
            190 => 
            array (
                'id' => '3306',
                'id_prov' => '33',
                'nama' => 'Kab. Purworejo',
            ),
            191 => 
            array (
                'id' => '3307',
                'id_prov' => '33',
                'nama' => 'Kab. Wonosobo',
            ),
            192 => 
            array (
                'id' => '3308',
                'id_prov' => '33',
                'nama' => 'Kab. Magelang',
            ),
            193 => 
            array (
                'id' => '3309',
                'id_prov' => '33',
                'nama' => 'Kab. Boyolali',
            ),
            194 => 
            array (
                'id' => '3310',
                'id_prov' => '33',
                'nama' => 'Kab. Klaten',
            ),
            195 => 
            array (
                'id' => '3311',
                'id_prov' => '33',
                'nama' => 'Kab. Sukoharjo',
            ),
            196 => 
            array (
                'id' => '3312',
                'id_prov' => '33',
                'nama' => 'Kab. Wonogiri',
            ),
            197 => 
            array (
                'id' => '3313',
                'id_prov' => '33',
                'nama' => 'Kab. Karanganyar',
            ),
            198 => 
            array (
                'id' => '3314',
                'id_prov' => '33',
                'nama' => 'Kab. Sragen',
            ),
            199 => 
            array (
                'id' => '3315',
                'id_prov' => '33',
                'nama' => 'Kab. Grobogan',
            ),
            200 => 
            array (
                'id' => '3316',
                'id_prov' => '33',
                'nama' => 'Kab. Blora',
            ),
            201 => 
            array (
                'id' => '3317',
                'id_prov' => '33',
                'nama' => 'Kab. Rembang',
            ),
            202 => 
            array (
                'id' => '3318',
                'id_prov' => '33',
                'nama' => 'Kab. Pati',
            ),
            203 => 
            array (
                'id' => '3319',
                'id_prov' => '33',
                'nama' => 'Kab. Kudus',
            ),
            204 => 
            array (
                'id' => '3320',
                'id_prov' => '33',
                'nama' => 'Kab. Jepara',
            ),
            205 => 
            array (
                'id' => '3321',
                'id_prov' => '33',
                'nama' => 'Kab. Demak',
            ),
            206 => 
            array (
                'id' => '3322',
                'id_prov' => '33',
                'nama' => 'Kab. Semarang',
            ),
            207 => 
            array (
                'id' => '3323',
                'id_prov' => '33',
                'nama' => 'Kab. Temanggung',
            ),
            208 => 
            array (
                'id' => '3324',
                'id_prov' => '33',
                'nama' => 'Kab. Kendal',
            ),
            209 => 
            array (
                'id' => '3325',
                'id_prov' => '33',
                'nama' => 'Kab. Batang',
            ),
            210 => 
            array (
                'id' => '3326',
                'id_prov' => '33',
                'nama' => 'Kab. Pekalongan',
            ),
            211 => 
            array (
                'id' => '3327',
                'id_prov' => '33',
                'nama' => 'Kab. Pemalang',
            ),
            212 => 
            array (
                'id' => '3328',
                'id_prov' => '33',
                'nama' => 'Kab. Tegal',
            ),
            213 => 
            array (
                'id' => '3329',
                'id_prov' => '33',
                'nama' => 'Kab. Brebes',
            ),
            214 => 
            array (
                'id' => '3371',
                'id_prov' => '33',
                'nama' => 'Kota Magelang',
            ),
            215 => 
            array (
                'id' => '3372',
                'id_prov' => '33',
                'nama' => 'Kota Surakarta',
            ),
            216 => 
            array (
                'id' => '3373',
                'id_prov' => '33',
                'nama' => 'Kota Salatiga',
            ),
            217 => 
            array (
                'id' => '3374',
                'id_prov' => '33',
                'nama' => 'Kota Semarang',
            ),
            218 => 
            array (
                'id' => '3375',
                'id_prov' => '33',
                'nama' => 'Kota Pekalongan',
            ),
            219 => 
            array (
                'id' => '3376',
                'id_prov' => '33',
                'nama' => 'Kota Tegal',
            ),
            220 => 
            array (
                'id' => '3401',
                'id_prov' => '34',
                'nama' => 'Kab. Kulon Progo',
            ),
            221 => 
            array (
                'id' => '3402',
                'id_prov' => '34',
                'nama' => 'Kab. Bantul',
            ),
            222 => 
            array (
                'id' => '3403',
                'id_prov' => '34',
                'nama' => 'Kab. Gunung Kidul',
            ),
            223 => 
            array (
                'id' => '3404',
                'id_prov' => '34',
                'nama' => 'Kab. Sleman',
            ),
            224 => 
            array (
                'id' => '3471',
                'id_prov' => '34',
                'nama' => 'Kota Yogyakarta',
            ),
            225 => 
            array (
                'id' => '3501',
                'id_prov' => '35',
                'nama' => 'Kab. Pacitan',
            ),
            226 => 
            array (
                'id' => '3502',
                'id_prov' => '35',
                'nama' => 'Kab. Ponorogo',
            ),
            227 => 
            array (
                'id' => '3503',
                'id_prov' => '35',
                'nama' => 'Kab. Trenggalek',
            ),
            228 => 
            array (
                'id' => '3504',
                'id_prov' => '35',
                'nama' => 'Kab. Tulungagung',
            ),
            229 => 
            array (
                'id' => '3505',
                'id_prov' => '35',
                'nama' => 'Kab. Blitar',
            ),
            230 => 
            array (
                'id' => '3506',
                'id_prov' => '35',
                'nama' => 'Kab. Kediri',
            ),
            231 => 
            array (
                'id' => '3507',
                'id_prov' => '35',
                'nama' => 'Kab. Malang',
            ),
            232 => 
            array (
                'id' => '3508',
                'id_prov' => '35',
                'nama' => 'Kab. Lumajang',
            ),
            233 => 
            array (
                'id' => '3509',
                'id_prov' => '35',
                'nama' => 'Kab. Jember',
            ),
            234 => 
            array (
                'id' => '3510',
                'id_prov' => '35',
                'nama' => 'Kab. Banyuwangi',
            ),
            235 => 
            array (
                'id' => '3511',
                'id_prov' => '35',
                'nama' => 'Kab. Bondowoso',
            ),
            236 => 
            array (
                'id' => '3512',
                'id_prov' => '35',
                'nama' => 'Kab. Situbondo',
            ),
            237 => 
            array (
                'id' => '3513',
                'id_prov' => '35',
                'nama' => 'Kab. Probolinggo',
            ),
            238 => 
            array (
                'id' => '3514',
                'id_prov' => '35',
                'nama' => 'Kab. Pasuruan',
            ),
            239 => 
            array (
                'id' => '3515',
                'id_prov' => '35',
                'nama' => 'Kab. Sidoarjo',
            ),
            240 => 
            array (
                'id' => '3516',
                'id_prov' => '35',
                'nama' => 'Kab. Mojokerto',
            ),
            241 => 
            array (
                'id' => '3517',
                'id_prov' => '35',
                'nama' => 'Kab. Jombang',
            ),
            242 => 
            array (
                'id' => '3518',
                'id_prov' => '35',
                'nama' => 'Kab. Nganjuk',
            ),
            243 => 
            array (
                'id' => '3519',
                'id_prov' => '35',
                'nama' => 'Kab. Madiun',
            ),
            244 => 
            array (
                'id' => '3520',
                'id_prov' => '35',
                'nama' => 'Kab. Magetan',
            ),
            245 => 
            array (
                'id' => '3521',
                'id_prov' => '35',
                'nama' => 'Kab. Ngawi',
            ),
            246 => 
            array (
                'id' => '3522',
                'id_prov' => '35',
                'nama' => 'Kab. Bojonegoro',
            ),
            247 => 
            array (
                'id' => '3523',
                'id_prov' => '35',
                'nama' => 'Kab. Tuban',
            ),
            248 => 
            array (
                'id' => '3524',
                'id_prov' => '35',
                'nama' => 'Kab. Lamongan',
            ),
            249 => 
            array (
                'id' => '3525',
                'id_prov' => '35',
                'nama' => 'Kab. Gresik',
            ),
            250 => 
            array (
                'id' => '3526',
                'id_prov' => '35',
                'nama' => 'Kab. Bangkalan',
            ),
            251 => 
            array (
                'id' => '3527',
                'id_prov' => '35',
                'nama' => 'Kab. Sampang',
            ),
            252 => 
            array (
                'id' => '3528',
                'id_prov' => '35',
                'nama' => 'Kab. Pamekasan',
            ),
            253 => 
            array (
                'id' => '3529',
                'id_prov' => '35',
                'nama' => 'Kab. Sumenep',
            ),
            254 => 
            array (
                'id' => '3571',
                'id_prov' => '35',
                'nama' => 'Kota Kediri',
            ),
            255 => 
            array (
                'id' => '3572',
                'id_prov' => '35',
                'nama' => 'Kota Blitar',
            ),
            256 => 
            array (
                'id' => '3573',
                'id_prov' => '35',
                'nama' => 'Kota Malang',
            ),
            257 => 
            array (
                'id' => '3574',
                'id_prov' => '35',
                'nama' => 'Kota Probolinggo',
            ),
            258 => 
            array (
                'id' => '3575',
                'id_prov' => '35',
                'nama' => 'Kota Pasuruan',
            ),
            259 => 
            array (
                'id' => '3576',
                'id_prov' => '35',
                'nama' => 'Kota Mojokerto',
            ),
            260 => 
            array (
                'id' => '3577',
                'id_prov' => '35',
                'nama' => 'Kota Madiun',
            ),
            261 => 
            array (
                'id' => '3578',
                'id_prov' => '35',
                'nama' => 'Kota Surabaya',
            ),
            262 => 
            array (
                'id' => '3579',
                'id_prov' => '35',
                'nama' => 'Kota Batu',
            ),
            263 => 
            array (
                'id' => '3601',
                'id_prov' => '36',
                'nama' => 'Kab. Pandeglang',
            ),
            264 => 
            array (
                'id' => '3602',
                'id_prov' => '36',
                'nama' => 'Kab. Lebak',
            ),
            265 => 
            array (
                'id' => '3603',
                'id_prov' => '36',
                'nama' => 'Kab. Tangerang',
            ),
            266 => 
            array (
                'id' => '3604',
                'id_prov' => '36',
                'nama' => 'Kab. Serang',
            ),
            267 => 
            array (
                'id' => '3671',
                'id_prov' => '36',
                'nama' => 'Kota Tangerang',
            ),
            268 => 
            array (
                'id' => '3672',
                'id_prov' => '36',
                'nama' => 'Kota Cilegon',
            ),
            269 => 
            array (
                'id' => '3673',
                'id_prov' => '36',
                'nama' => 'Kota Serang',
            ),
            270 => 
            array (
                'id' => '3674',
                'id_prov' => '36',
                'nama' => 'Kota Tangerang Selatan',
            ),
            271 => 
            array (
                'id' => '5101',
                'id_prov' => '51',
                'nama' => 'Kab. Jembrana',
            ),
            272 => 
            array (
                'id' => '5102',
                'id_prov' => '51',
                'nama' => 'Kab. Tabanan',
            ),
            273 => 
            array (
                'id' => '5103',
                'id_prov' => '51',
                'nama' => 'Kab. Badung',
            ),
            274 => 
            array (
                'id' => '5104',
                'id_prov' => '51',
                'nama' => 'Kab. Gianyar',
            ),
            275 => 
            array (
                'id' => '5105',
                'id_prov' => '51',
                'nama' => 'Kab. Klungkung',
            ),
            276 => 
            array (
                'id' => '5106',
                'id_prov' => '51',
                'nama' => 'Kab. Bangli',
            ),
            277 => 
            array (
                'id' => '5107',
                'id_prov' => '51',
                'nama' => 'Kab. Karang Asem',
            ),
            278 => 
            array (
                'id' => '5108',
                'id_prov' => '51',
                'nama' => 'Kab. Buleleng',
            ),
            279 => 
            array (
                'id' => '5171',
                'id_prov' => '51',
                'nama' => 'Kota Denpasar',
            ),
            280 => 
            array (
                'id' => '5201',
                'id_prov' => '52',
                'nama' => 'Kab. Lombok Barat',
            ),
            281 => 
            array (
                'id' => '5202',
                'id_prov' => '52',
                'nama' => 'Kab. Lombok Tengah',
            ),
            282 => 
            array (
                'id' => '5203',
                'id_prov' => '52',
                'nama' => 'Kab. Lombok Timur',
            ),
            283 => 
            array (
                'id' => '5204',
                'id_prov' => '52',
                'nama' => 'Kab. Sumbawa',
            ),
            284 => 
            array (
                'id' => '5205',
                'id_prov' => '52',
                'nama' => 'Kab. Dompu',
            ),
            285 => 
            array (
                'id' => '5206',
                'id_prov' => '52',
                'nama' => 'Kab. Bima',
            ),
            286 => 
            array (
                'id' => '5207',
                'id_prov' => '52',
                'nama' => 'Kab. Sumbawa Barat',
            ),
            287 => 
            array (
                'id' => '5208',
                'id_prov' => '52',
                'nama' => 'Kab. Lombok Utara',
            ),
            288 => 
            array (
                'id' => '5271',
                'id_prov' => '52',
                'nama' => 'Kota Mataram',
            ),
            289 => 
            array (
                'id' => '5272',
                'id_prov' => '52',
                'nama' => 'Kota Bima',
            ),
            290 => 
            array (
                'id' => '5301',
                'id_prov' => '53',
                'nama' => 'Kab. Sumba Barat',
            ),
            291 => 
            array (
                'id' => '5302',
                'id_prov' => '53',
                'nama' => 'Kab. Sumba Timur',
            ),
            292 => 
            array (
                'id' => '5303',
                'id_prov' => '53',
                'nama' => 'Kab. Kupang',
            ),
            293 => 
            array (
                'id' => '5304',
                'id_prov' => '53',
                'nama' => 'Kab. Timor Tengah Selatan',
            ),
            294 => 
            array (
                'id' => '5305',
                'id_prov' => '53',
                'nama' => 'Kab. Timor Tengah Utara',
            ),
            295 => 
            array (
                'id' => '5306',
                'id_prov' => '53',
                'nama' => 'Kab. Belu',
            ),
            296 => 
            array (
                'id' => '5307',
                'id_prov' => '53',
                'nama' => 'Kab. Alor',
            ),
            297 => 
            array (
                'id' => '5308',
                'id_prov' => '53',
                'nama' => 'Kab. Lembata',
            ),
            298 => 
            array (
                'id' => '5309',
                'id_prov' => '53',
                'nama' => 'Kab. Flores Timur',
            ),
            299 => 
            array (
                'id' => '5310',
                'id_prov' => '53',
                'nama' => 'Kab. Sikka',
            ),
            300 => 
            array (
                'id' => '5311',
                'id_prov' => '53',
                'nama' => 'Kab. Ende',
            ),
            301 => 
            array (
                'id' => '5312',
                'id_prov' => '53',
                'nama' => 'Kab. Ngada',
            ),
            302 => 
            array (
                'id' => '5313',
                'id_prov' => '53',
                'nama' => 'Kab. Manggarai',
            ),
            303 => 
            array (
                'id' => '5314',
                'id_prov' => '53',
                'nama' => 'Kab. Rote Ndao',
            ),
            304 => 
            array (
                'id' => '5315',
                'id_prov' => '53',
                'nama' => 'Kab. Manggarai Barat',
            ),
            305 => 
            array (
                'id' => '5316',
                'id_prov' => '53',
                'nama' => 'Kab. Sumba Tengah',
            ),
            306 => 
            array (
                'id' => '5317',
                'id_prov' => '53',
                'nama' => 'Kab. Sumba Barat Daya',
            ),
            307 => 
            array (
                'id' => '5318',
                'id_prov' => '53',
                'nama' => 'Kab. Nagekeo',
            ),
            308 => 
            array (
                'id' => '5319',
                'id_prov' => '53',
                'nama' => 'Kab. Manggarai Timur',
            ),
            309 => 
            array (
                'id' => '5320',
                'id_prov' => '53',
                'nama' => 'Kab. Sabu Raijua',
            ),
            310 => 
            array (
                'id' => '5371',
                'id_prov' => '53',
                'nama' => 'Kota Kupang',
            ),
            311 => 
            array (
                'id' => '6101',
                'id_prov' => '61',
                'nama' => 'Kab. Sambas',
            ),
            312 => 
            array (
                'id' => '6102',
                'id_prov' => '61',
                'nama' => 'Kab. Bengkayang',
            ),
            313 => 
            array (
                'id' => '6103',
                'id_prov' => '61',
                'nama' => 'Kab. Landak',
            ),
            314 => 
            array (
                'id' => '6104',
                'id_prov' => '61',
                'nama' => 'Kab. Pontianak',
            ),
            315 => 
            array (
                'id' => '6105',
                'id_prov' => '61',
                'nama' => 'Kab. Sanggau',
            ),
            316 => 
            array (
                'id' => '6106',
                'id_prov' => '61',
                'nama' => 'Kab. Ketapang',
            ),
            317 => 
            array (
                'id' => '6107',
                'id_prov' => '61',
                'nama' => 'Kab. Sintang',
            ),
            318 => 
            array (
                'id' => '6108',
                'id_prov' => '61',
                'nama' => 'Kab. Kapuas Hulu',
            ),
            319 => 
            array (
                'id' => '6109',
                'id_prov' => '61',
                'nama' => 'Kab. Sekadau',
            ),
            320 => 
            array (
                'id' => '6110',
                'id_prov' => '61',
                'nama' => 'Kab. Melawi',
            ),
            321 => 
            array (
                'id' => '6111',
                'id_prov' => '61',
                'nama' => 'Kab. Kayong Utara',
            ),
            322 => 
            array (
                'id' => '6112',
                'id_prov' => '61',
                'nama' => 'Kab. Kubu Raya',
            ),
            323 => 
            array (
                'id' => '6171',
                'id_prov' => '61',
                'nama' => 'Kota Pontianak',
            ),
            324 => 
            array (
                'id' => '6172',
                'id_prov' => '61',
                'nama' => 'Kota Singkawang',
            ),
            325 => 
            array (
                'id' => '6201',
                'id_prov' => '62',
                'nama' => 'Kab. Kotawaringin Barat',
            ),
            326 => 
            array (
                'id' => '6202',
                'id_prov' => '62',
                'nama' => 'Kab. Kotawaringin Timur',
            ),
            327 => 
            array (
                'id' => '6203',
                'id_prov' => '62',
                'nama' => 'Kab. Kapuas',
            ),
            328 => 
            array (
                'id' => '6204',
                'id_prov' => '62',
                'nama' => 'Kab. Barito Selatan',
            ),
            329 => 
            array (
                'id' => '6205',
                'id_prov' => '62',
                'nama' => 'Kab. Barito Utara',
            ),
            330 => 
            array (
                'id' => '6206',
                'id_prov' => '62',
                'nama' => 'Kab. Sukamara',
            ),
            331 => 
            array (
                'id' => '6207',
                'id_prov' => '62',
                'nama' => 'Kab. Lamandau',
            ),
            332 => 
            array (
                'id' => '6208',
                'id_prov' => '62',
                'nama' => 'Kab. Seruyan',
            ),
            333 => 
            array (
                'id' => '6209',
                'id_prov' => '62',
                'nama' => 'Kab. Katingan',
            ),
            334 => 
            array (
                'id' => '6210',
                'id_prov' => '62',
                'nama' => 'Kab. Pulang Pisau',
            ),
            335 => 
            array (
                'id' => '6211',
                'id_prov' => '62',
                'nama' => 'Kab. Gunung Mas',
            ),
            336 => 
            array (
                'id' => '6212',
                'id_prov' => '62',
                'nama' => 'Kab. Barito Timur',
            ),
            337 => 
            array (
                'id' => '6213',
                'id_prov' => '62',
                'nama' => 'Kab. Murung Raya',
            ),
            338 => 
            array (
                'id' => '6271',
                'id_prov' => '62',
                'nama' => 'Kota Palangka Raya',
            ),
            339 => 
            array (
                'id' => '6301',
                'id_prov' => '63',
                'nama' => 'Kab. Tanah Laut',
            ),
            340 => 
            array (
                'id' => '6302',
                'id_prov' => '63',
                'nama' => 'Kab. Kota Baru',
            ),
            341 => 
            array (
                'id' => '6303',
                'id_prov' => '63',
                'nama' => 'Kab. Banjar',
            ),
            342 => 
            array (
                'id' => '6304',
                'id_prov' => '63',
                'nama' => 'Kab. Barito Kuala',
            ),
            343 => 
            array (
                'id' => '6305',
                'id_prov' => '63',
                'nama' => 'Kab. Tapin',
            ),
            344 => 
            array (
                'id' => '6306',
                'id_prov' => '63',
                'nama' => 'Kab. Hulu Sungai Selatan',
            ),
            345 => 
            array (
                'id' => '6307',
                'id_prov' => '63',
                'nama' => 'Kab. Hulu Sungai Tengah',
            ),
            346 => 
            array (
                'id' => '6308',
                'id_prov' => '63',
                'nama' => 'Kab. Hulu Sungai Utara',
            ),
            347 => 
            array (
                'id' => '6309',
                'id_prov' => '63',
                'nama' => 'Kab. Tabalong',
            ),
            348 => 
            array (
                'id' => '6310',
                'id_prov' => '63',
                'nama' => 'Kab. Tanah Bumbu',
            ),
            349 => 
            array (
                'id' => '6311',
                'id_prov' => '63',
                'nama' => 'Kab. Balangan',
            ),
            350 => 
            array (
                'id' => '6371',
                'id_prov' => '63',
                'nama' => 'Kota Banjarmasin',
            ),
            351 => 
            array (
                'id' => '6372',
                'id_prov' => '63',
                'nama' => 'Kota Banjar Baru',
            ),
            352 => 
            array (
                'id' => '6401',
                'id_prov' => '64',
                'nama' => 'Kab. Paser',
            ),
            353 => 
            array (
                'id' => '6402',
                'id_prov' => '64',
                'nama' => 'Kab. Kutai Barat',
            ),
            354 => 
            array (
                'id' => '6403',
                'id_prov' => '64',
                'nama' => 'Kab. Kutai Kartanegara',
            ),
            355 => 
            array (
                'id' => '6404',
                'id_prov' => '64',
                'nama' => 'Kab. Kutai Timur',
            ),
            356 => 
            array (
                'id' => '6405',
                'id_prov' => '64',
                'nama' => 'Kab. Berau',
            ),
            357 => 
            array (
                'id' => '6409',
                'id_prov' => '64',
                'nama' => 'Kab. Penajam Paser Utara',
            ),
            358 => 
            array (
                'id' => '6471',
                'id_prov' => '64',
                'nama' => 'Kota Balikpapan',
            ),
            359 => 
            array (
                'id' => '6472',
                'id_prov' => '64',
                'nama' => 'Kota Samarinda',
            ),
            360 => 
            array (
                'id' => '6474',
                'id_prov' => '64',
                'nama' => 'Kota Bontang',
            ),
            361 => 
            array (
                'id' => '6501',
                'id_prov' => '65',
                'nama' => 'Kab. Malinau',
            ),
            362 => 
            array (
                'id' => '6502',
                'id_prov' => '65',
                'nama' => 'Kab. Bulungan',
            ),
            363 => 
            array (
                'id' => '6503',
                'id_prov' => '65',
                'nama' => 'Kab. Tana Tidung',
            ),
            364 => 
            array (
                'id' => '6504',
                'id_prov' => '65',
                'nama' => 'Kab. Nunukan',
            ),
            365 => 
            array (
                'id' => '6571',
                'id_prov' => '65',
                'nama' => 'Kota Tarakan',
            ),
            366 => 
            array (
                'id' => '7101',
                'id_prov' => '71',
                'nama' => 'Kab. Bolaang Mongondow',
            ),
            367 => 
            array (
                'id' => '7102',
                'id_prov' => '71',
                'nama' => 'Kab. Minahasa',
            ),
            368 => 
            array (
                'id' => '7103',
                'id_prov' => '71',
                'nama' => 'Kab. Kepulauan Sangihe',
            ),
            369 => 
            array (
                'id' => '7104',
                'id_prov' => '71',
                'nama' => 'Kab. Kepulauan Talaud',
            ),
            370 => 
            array (
                'id' => '7105',
                'id_prov' => '71',
                'nama' => 'Kab. Minahasa Selatan',
            ),
            371 => 
            array (
                'id' => '7106',
                'id_prov' => '71',
                'nama' => 'Kab. Minahasa Utara',
            ),
            372 => 
            array (
                'id' => '7107',
                'id_prov' => '71',
                'nama' => 'Kab. Bolaang Mongondow Utara',
            ),
            373 => 
            array (
                'id' => '7108',
                'id_prov' => '71',
                'nama' => 'Kab. Siau Tagulandang Biaro',
            ),
            374 => 
            array (
                'id' => '7109',
                'id_prov' => '71',
                'nama' => 'Kab. Minahasa Tenggara',
            ),
            375 => 
            array (
                'id' => '7110',
                'id_prov' => '71',
                'nama' => 'Kab. Bolaang Mongondow Selatan',
            ),
            376 => 
            array (
                'id' => '7111',
                'id_prov' => '71',
                'nama' => 'Kab. Bolaang Mongondow Timur',
            ),
            377 => 
            array (
                'id' => '7171',
                'id_prov' => '71',
                'nama' => 'Kota Manado',
            ),
            378 => 
            array (
                'id' => '7172',
                'id_prov' => '71',
                'nama' => 'Kota Bitung',
            ),
            379 => 
            array (
                'id' => '7173',
                'id_prov' => '71',
                'nama' => 'Kota Tomohon',
            ),
            380 => 
            array (
                'id' => '7174',
                'id_prov' => '71',
                'nama' => 'Kota Kotamobagu',
            ),
            381 => 
            array (
                'id' => '7201',
                'id_prov' => '72',
                'nama' => 'Kab. Banggai Kepulauan',
            ),
            382 => 
            array (
                'id' => '7202',
                'id_prov' => '72',
                'nama' => 'Kab. Banggai',
            ),
            383 => 
            array (
                'id' => '7203',
                'id_prov' => '72',
                'nama' => 'Kab. Morowali',
            ),
            384 => 
            array (
                'id' => '7204',
                'id_prov' => '72',
                'nama' => 'Kab. Poso',
            ),
            385 => 
            array (
                'id' => '7205',
                'id_prov' => '72',
                'nama' => 'Kab. Donggala',
            ),
            386 => 
            array (
                'id' => '7206',
                'id_prov' => '72',
                'nama' => 'Kab. Toli-toli',
            ),
            387 => 
            array (
                'id' => '7207',
                'id_prov' => '72',
                'nama' => 'Kab. Buol',
            ),
            388 => 
            array (
                'id' => '7208',
                'id_prov' => '72',
                'nama' => 'Kab. Parigi Moutong',
            ),
            389 => 
            array (
                'id' => '7209',
                'id_prov' => '72',
                'nama' => 'Kab. Tojo Una-una',
            ),
            390 => 
            array (
                'id' => '7210',
                'id_prov' => '72',
                'nama' => 'Kab. Sigi',
            ),
            391 => 
            array (
                'id' => '7271',
                'id_prov' => '72',
                'nama' => 'Kota Palu',
            ),
            392 => 
            array (
                'id' => '7301',
                'id_prov' => '73',
                'nama' => 'Kab. Kepulauan Selayar',
            ),
            393 => 
            array (
                'id' => '7302',
                'id_prov' => '73',
                'nama' => 'Kab. Bulukumba',
            ),
            394 => 
            array (
                'id' => '7303',
                'id_prov' => '73',
                'nama' => 'Kab. Bantaeng',
            ),
            395 => 
            array (
                'id' => '7304',
                'id_prov' => '73',
                'nama' => 'Kab. Jeneponto',
            ),
            396 => 
            array (
                'id' => '7305',
                'id_prov' => '73',
                'nama' => 'Kab. Takalar',
            ),
            397 => 
            array (
                'id' => '7306',
                'id_prov' => '73',
                'nama' => 'Kab. Gowa',
            ),
            398 => 
            array (
                'id' => '7307',
                'id_prov' => '73',
                'nama' => 'Kab. Sinjai',
            ),
            399 => 
            array (
                'id' => '7308',
                'id_prov' => '73',
                'nama' => 'Kab. Maros',
            ),
            400 => 
            array (
                'id' => '7309',
                'id_prov' => '73',
                'nama' => 'Kab. Pangkajene Dan Kepulauan',
            ),
            401 => 
            array (
                'id' => '7310',
                'id_prov' => '73',
                'nama' => 'Kab. Barru',
            ),
            402 => 
            array (
                'id' => '7311',
                'id_prov' => '73',
                'nama' => 'Kab. Bone',
            ),
            403 => 
            array (
                'id' => '7312',
                'id_prov' => '73',
                'nama' => 'Kab. Soppeng',
            ),
            404 => 
            array (
                'id' => '7313',
                'id_prov' => '73',
                'nama' => 'Kab. Wajo',
            ),
            405 => 
            array (
                'id' => '7314',
                'id_prov' => '73',
                'nama' => 'Kab. Sidenreng Rappang',
            ),
            406 => 
            array (
                'id' => '7315',
                'id_prov' => '73',
                'nama' => 'Kab. Pinrang',
            ),
            407 => 
            array (
                'id' => '7316',
                'id_prov' => '73',
                'nama' => 'Kab. Enrekang',
            ),
            408 => 
            array (
                'id' => '7317',
                'id_prov' => '73',
                'nama' => 'Kab. Luwu',
            ),
            409 => 
            array (
                'id' => '7318',
                'id_prov' => '73',
                'nama' => 'Kab. Tana Toraja',
            ),
            410 => 
            array (
                'id' => '7322',
                'id_prov' => '73',
                'nama' => 'Kab. Luwu Utara',
            ),
            411 => 
            array (
                'id' => '7325',
                'id_prov' => '73',
                'nama' => 'Kab. Luwu Timur',
            ),
            412 => 
            array (
                'id' => '7326',
                'id_prov' => '73',
                'nama' => 'Kab. Toraja Utara',
            ),
            413 => 
            array (
                'id' => '7371',
                'id_prov' => '73',
                'nama' => 'Kota Makassar',
            ),
            414 => 
            array (
                'id' => '7372',
                'id_prov' => '73',
                'nama' => 'Kota Parepare',
            ),
            415 => 
            array (
                'id' => '7373',
                'id_prov' => '73',
                'nama' => 'Kota Palopo',
            ),
            416 => 
            array (
                'id' => '7401',
                'id_prov' => '74',
                'nama' => 'Kab. Buton',
            ),
            417 => 
            array (
                'id' => '7402',
                'id_prov' => '74',
                'nama' => 'Kab. Muna',
            ),
            418 => 
            array (
                'id' => '7403',
                'id_prov' => '74',
                'nama' => 'Kab. Konawe',
            ),
            419 => 
            array (
                'id' => '7404',
                'id_prov' => '74',
                'nama' => 'Kab. Kolaka',
            ),
            420 => 
            array (
                'id' => '7405',
                'id_prov' => '74',
                'nama' => 'Kab. Konawe Selatan',
            ),
            421 => 
            array (
                'id' => '7406',
                'id_prov' => '74',
                'nama' => 'Kab. Bombana',
            ),
            422 => 
            array (
                'id' => '7407',
                'id_prov' => '74',
                'nama' => 'Kab. Wakatobi',
            ),
            423 => 
            array (
                'id' => '7408',
                'id_prov' => '74',
                'nama' => 'Kab. Kolaka Utara',
            ),
            424 => 
            array (
                'id' => '7409',
                'id_prov' => '74',
                'nama' => 'Kab. Buton Utara',
            ),
            425 => 
            array (
                'id' => '7410',
                'id_prov' => '74',
                'nama' => 'Kab. Konawe Utara',
            ),
            426 => 
            array (
                'id' => '7471',
                'id_prov' => '74',
                'nama' => 'Kota Kendari',
            ),
            427 => 
            array (
                'id' => '7472',
                'id_prov' => '74',
                'nama' => 'Kota Baubau',
            ),
            428 => 
            array (
                'id' => '7501',
                'id_prov' => '75',
                'nama' => 'Kab. Boalemo',
            ),
            429 => 
            array (
                'id' => '7502',
                'id_prov' => '75',
                'nama' => 'Kab. Gorontalo',
            ),
            430 => 
            array (
                'id' => '7503',
                'id_prov' => '75',
                'nama' => 'Kab. Pohuwato',
            ),
            431 => 
            array (
                'id' => '7504',
                'id_prov' => '75',
                'nama' => 'Kab. Bone Bolango',
            ),
            432 => 
            array (
                'id' => '7505',
                'id_prov' => '75',
                'nama' => 'Kab. Gorontalo Utara',
            ),
            433 => 
            array (
                'id' => '7571',
                'id_prov' => '75',
                'nama' => 'Kota Gorontalo',
            ),
            434 => 
            array (
                'id' => '7601',
                'id_prov' => '76',
                'nama' => 'Kab. Majene',
            ),
            435 => 
            array (
                'id' => '7602',
                'id_prov' => '76',
                'nama' => 'Kab. Polewali Mandar',
            ),
            436 => 
            array (
                'id' => '7603',
                'id_prov' => '76',
                'nama' => 'Kab. Mamasa',
            ),
            437 => 
            array (
                'id' => '7604',
                'id_prov' => '76',
                'nama' => 'Kab. Mamuju',
            ),
            438 => 
            array (
                'id' => '7605',
                'id_prov' => '76',
                'nama' => 'Kab. Mamuju Utara',
            ),
            439 => 
            array (
                'id' => '8101',
                'id_prov' => '81',
                'nama' => 'Kab. Maluku Tenggara Barat',
            ),
            440 => 
            array (
                'id' => '8102',
                'id_prov' => '81',
                'nama' => 'Kab. Maluku Tenggara',
            ),
            441 => 
            array (
                'id' => '8103',
                'id_prov' => '81',
                'nama' => 'Kab. Maluku Tengah',
            ),
            442 => 
            array (
                'id' => '8104',
                'id_prov' => '81',
                'nama' => 'Kab. Buru',
            ),
            443 => 
            array (
                'id' => '8105',
                'id_prov' => '81',
                'nama' => 'Kab. Kepulauan Aru',
            ),
            444 => 
            array (
                'id' => '8106',
                'id_prov' => '81',
                'nama' => 'Kab. Seram Bagian Barat',
            ),
            445 => 
            array (
                'id' => '8107',
                'id_prov' => '81',
                'nama' => 'Kab. Seram Bagian Timur',
            ),
            446 => 
            array (
                'id' => '8108',
                'id_prov' => '81',
                'nama' => 'Kab. Maluku Barat Daya',
            ),
            447 => 
            array (
                'id' => '8109',
                'id_prov' => '81',
                'nama' => 'Kab. Buru Selatan',
            ),
            448 => 
            array (
                'id' => '8171',
                'id_prov' => '81',
                'nama' => 'Kota Ambon',
            ),
            449 => 
            array (
                'id' => '8172',
                'id_prov' => '81',
                'nama' => 'Kota Tual',
            ),
            450 => 
            array (
                'id' => '8201',
                'id_prov' => '82',
                'nama' => 'Kab. Halmahera Barat',
            ),
            451 => 
            array (
                'id' => '8202',
                'id_prov' => '82',
                'nama' => 'Kab. Halmahera Tengah',
            ),
            452 => 
            array (
                'id' => '8203',
                'id_prov' => '82',
                'nama' => 'Kab. Kepulauan Sula',
            ),
            453 => 
            array (
                'id' => '8204',
                'id_prov' => '82',
                'nama' => 'Kab. Halmahera Selatan',
            ),
            454 => 
            array (
                'id' => '8205',
                'id_prov' => '82',
                'nama' => 'Kab. Halmahera Utara',
            ),
            455 => 
            array (
                'id' => '8206',
                'id_prov' => '82',
                'nama' => 'Kab. Halmahera Timur',
            ),
            456 => 
            array (
                'id' => '8207',
                'id_prov' => '82',
                'nama' => 'Kab. Pulau Morotai',
            ),
            457 => 
            array (
                'id' => '8271',
                'id_prov' => '82',
                'nama' => 'Kota Ternate',
            ),
            458 => 
            array (
                'id' => '8272',
                'id_prov' => '82',
                'nama' => 'Kota Tidore Kepulauan',
            ),
            459 => 
            array (
                'id' => '9101',
                'id_prov' => '91',
                'nama' => 'Kab. Fakfak',
            ),
            460 => 
            array (
                'id' => '9102',
                'id_prov' => '91',
                'nama' => 'Kab. Kaimana',
            ),
            461 => 
            array (
                'id' => '9103',
                'id_prov' => '91',
                'nama' => 'Kab. Teluk Wondama',
            ),
            462 => 
            array (
                'id' => '9104',
                'id_prov' => '91',
                'nama' => 'Kab. Teluk Bintuni',
            ),
            463 => 
            array (
                'id' => '9105',
                'id_prov' => '91',
                'nama' => 'Kab. Manokwari',
            ),
            464 => 
            array (
                'id' => '9106',
                'id_prov' => '91',
                'nama' => 'Kab. Sorong Selatan',
            ),
            465 => 
            array (
                'id' => '9107',
                'id_prov' => '91',
                'nama' => 'Kab. Sorong',
            ),
            466 => 
            array (
                'id' => '9108',
                'id_prov' => '91',
                'nama' => 'Kab. Raja Ampat',
            ),
            467 => 
            array (
                'id' => '9109',
                'id_prov' => '91',
                'nama' => 'Kab. Tambrauw',
            ),
            468 => 
            array (
                'id' => '9110',
                'id_prov' => '91',
                'nama' => 'Kab. Maybrat',
            ),
            469 => 
            array (
                'id' => '9171',
                'id_prov' => '91',
                'nama' => 'Kota Sorong',
            ),
            470 => 
            array (
                'id' => '9401',
                'id_prov' => '94',
                'nama' => 'Kab. Merauke',
            ),
            471 => 
            array (
                'id' => '9402',
                'id_prov' => '94',
                'nama' => 'Kab. Jayawijaya',
            ),
            472 => 
            array (
                'id' => '9403',
                'id_prov' => '94',
                'nama' => 'Kab. Jayapura',
            ),
            473 => 
            array (
                'id' => '9404',
                'id_prov' => '94',
                'nama' => 'Kab. Nabire',
            ),
            474 => 
            array (
                'id' => '9408',
                'id_prov' => '94',
                'nama' => 'Kab. Kepulauan Yapen',
            ),
            475 => 
            array (
                'id' => '9409',
                'id_prov' => '94',
                'nama' => 'Kab. Biak Numfor',
            ),
            476 => 
            array (
                'id' => '9410',
                'id_prov' => '94',
                'nama' => 'Kab. Paniai',
            ),
            477 => 
            array (
                'id' => '9411',
                'id_prov' => '94',
                'nama' => 'Kab. Puncak Jaya',
            ),
            478 => 
            array (
                'id' => '9412',
                'id_prov' => '94',
                'nama' => 'Kab. Mimika',
            ),
            479 => 
            array (
                'id' => '9413',
                'id_prov' => '94',
                'nama' => 'Kab. Boven Digoel',
            ),
            480 => 
            array (
                'id' => '9414',
                'id_prov' => '94',
                'nama' => 'Kab. Mappi',
            ),
            481 => 
            array (
                'id' => '9415',
                'id_prov' => '94',
                'nama' => 'Kab. Asmat',
            ),
            482 => 
            array (
                'id' => '9416',
                'id_prov' => '94',
                'nama' => 'Kab. Yahukimo',
            ),
            483 => 
            array (
                'id' => '9417',
                'id_prov' => '94',
                'nama' => 'Kab. Pegunungan Bintang',
            ),
            484 => 
            array (
                'id' => '9418',
                'id_prov' => '94',
                'nama' => 'Kab. Tolikara',
            ),
            485 => 
            array (
                'id' => '9419',
                'id_prov' => '94',
                'nama' => 'Kab. Sarmi',
            ),
            486 => 
            array (
                'id' => '9420',
                'id_prov' => '94',
                'nama' => 'Kab. Keerom',
            ),
            487 => 
            array (
                'id' => '9426',
                'id_prov' => '94',
                'nama' => 'Kab. Waropen',
            ),
            488 => 
            array (
                'id' => '9427',
                'id_prov' => '94',
                'nama' => 'Kab. Supiori',
            ),
            489 => 
            array (
                'id' => '9428',
                'id_prov' => '94',
                'nama' => 'Kab. Mamberamo Raya',
            ),
            490 => 
            array (
                'id' => '9429',
                'id_prov' => '94',
                'nama' => 'Kab. Nduga',
            ),
            491 => 
            array (
                'id' => '9430',
                'id_prov' => '94',
                'nama' => 'Kab. Lanny Jaya',
            ),
            492 => 
            array (
                'id' => '9431',
                'id_prov' => '94',
                'nama' => 'Kab. Mamberamo Tengah',
            ),
            493 => 
            array (
                'id' => '9432',
                'id_prov' => '94',
                'nama' => 'Kab. Yalimo',
            ),
            494 => 
            array (
                'id' => '9433',
                'id_prov' => '94',
                'nama' => 'Kab. Puncak',
            ),
            495 => 
            array (
                'id' => '9434',
                'id_prov' => '94',
                'nama' => 'Kab. Dogiyai',
            ),
            496 => 
            array (
                'id' => '9435',
                'id_prov' => '94',
                'nama' => 'Kab. Intan Jaya',
            ),
            497 => 
            array (
                'id' => '9436',
                'id_prov' => '94',
                'nama' => 'Kab. Deiyai',
            ),
            498 => 
            array (
                'id' => '9471',
                'id_prov' => '94',
                'nama' => 'Kota Jayapura',
            ),
        ));
        
        
    }
}
