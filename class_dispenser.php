<?php
        class Dispenser{
            protected $volume;
            protected $hargaSegelas;
            protected $volumeGelas;
            public $namaMinuman;
            public $saldo;

            public function __construct($volume, $hargaSegelas, $volumeGelas, $namaMinuman, $saldo) {
                $this->volume = $volume;
                $this->hargaSegelas = $hargaSegelas;
                $this->volumeGelas = $volumeGelas;
                $this->namaMinuman = $namaMinuman;
                $this->saldo = $saldo;
            }

            public function getLabel() {
                return "$this->namaMinuman, (Rp. {$this->hargaSegelas})";
            }

            public function tampilProduk() {
                $str = "{$this->getLabel()} | (Volume Gelas : {$this->volumeGelas} ml) (Volume Wadah : {$this->volume} ml)";
                return $str;
            }

            public function isiGelas($gelas) {
                $this->volumeGelas = $this->volumeGelas + $gelas;
                $this->volume = $this->volume - $gelas;
            }

        }

        class airMinum extends Dispenser {

            public function tampilProduk() {
                $str = "{$this->getLabel()} | (Volume Gelas : {$this->volumeGelas} ml) (Volume Wadah : {$this->volume} ml) ^ (sisa saldo : {$this->saldo} Ribu)";
                return $str;
            }

            public function isiUlangWadah($wadah) {
                $this->volume = $this->volume + $wadah;
            }

            public function totalBiaya($harga) {
                $this->saldo = $this->saldo - $harga;
            }
        }

        $minuman1 = new airMinum(500, 3500, 100, "Air Minum", 20000);

        echo "</br>";
        echo "Info Awal :";
        echo "</br>";
        echo $minuman1->tampilProduk();
        echo "</br>";

        $minuman1->isiUlangWadah(100);
        echo "</br>";

        echo "Tambah volume wadah :";
        echo "</br>";
        echo $minuman1->tampilProduk();

        $minuman1->isiGelas(150);
        echo "</br>";

        echo "</br>";
        echo "Isi air minum :";
        echo "</br>";
        echo $minuman1->tampilProduk();

        $minuman1->totalBiaya(3500);
        echo "</br>";

        echo "</br>";
        echo "Total biaya :";
        echo "</br>";
        echo $minuman1->tampilProduk();
?>