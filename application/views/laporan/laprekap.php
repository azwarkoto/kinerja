<script language="JavaScript">
  function loadprint(){
  window.print();


} </script>

<style type="text/css">
    <!--
    .style3 {
        font-size: 16px;
    }

    .style4 {
        font-size: 12px
    }

    .style6 {
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .style43 {
        font-family: Geneva, Arial, Helvetica, sans-serif
    }

    .style55 {
        font-size: 14px;
        font-family: Geneva, Arial, Helvetica, sans-serif;
    }

    .style56 {
        font-size: 14px;
    }

    .style80 {
        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .style81 {
        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .style82 {
        font-size: 14px
    }

    .style83 {
        font-family: Geneva, Arial, Helvetica, sans-serif;
        font-size: 14px;
    }

    -->
</style>
<body onLoad="loadprint();">

<div align="right">

    <style type="text/css">
        <!--
        table[border="1"] {
            border-collapse: collapse;
            background-color: white;
            padding-left: 5px;
        }

        table[border="1"] td {
            border: 1px solid black;
            padding-left: 5px;

        }

        .style3 {
            font-size: 18px;
            font-weight: bold;
            color: #000000;
        }

        .style4 {
            color: #000000;
        }

        -->
    </style>

</div>
<table width="718px" border="0" style="margin-top:-15px; width: 100px;">
    <tr>
        <td width="686px" height="42">
            <div align="center" class="style3">
                <div align="center" class="style6">REKAP HASIL PENILAIAN KINERJA GURU KELAS/MATA PELAJARAN</div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <table width="707" border="1" align="center" class="table">
                <tr>
                    <td class="td" width="225"><span class="style55">Nama</span></td>
                    <td class="td" width="8"><span class="style56 style43">:</span></td>
                    <td class="td" width="437"><span class="style56 style43"><?php echo $listguru->nama; ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">NIP</span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php echo $listguru->nip; ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">Tempat/Tanggal Lahir </span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span
                            class="style56 style43"><?php echo $listguru->tempatlahir . "/" . $listguru->tanggallahir;; ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">Pangkat/Jabatan/Golongan</span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php
                            foreach ($listpangkat as $pangkat) {
                                if ($listguru->kodepangkat == $pangkat->kodepangkat) {
                                    echo $pangkat->namapangkat . "/";
                                }
                            }
                            foreach ($listjabatan as $jabatan) {
                                if ($listguru->kodejabatan == $jabatan->kodejabatan) {
                                    echo $jabatan->namajabatan . "/";
                                }
                            }
                            foreach ($listgolongan as $golongan) {
                                if ($listguru->kodegolongan == $golongan->kodegolongan) {
                                    echo $golongan->namagolongan;
                                }
                            } ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">TMT sebagai guru </span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php echo $listguru->tmtguru; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Masa Kerja </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->masakerja; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Jenis Kelamin </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43">
          <?php echo $listguru->jeniskelamin ?>
        </span></td>
                </tr>
                <tr>
                    <td><span class="style55">Pendidikan Terakhir/Spesialisasi</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->pendidikan ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Progam Keahlian yang diampu </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->program ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55"><label></label></span></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><span class="style55">Nama Instansi / Sekolah </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43">
          <?php echo $listsekolah->nama; ?>
        </span></td>
                </tr>
                <tr>
                    <td><span class="style55">Telp / Fax </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->telp; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kelurahan</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kelurahan; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kecamatan</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kecamatan; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kabupaten / Kota </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kabupaten; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Provinsi</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->provinsi; ?></span></td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td>
            <?php foreach ($listpenilaian as $key) {
                if ($listnilai->kodepenilaian == $key->kodepenilai) {
                    ?>


                    <table width="707" border="1" align="center" class="table">
                        <tr>
                            <td width="325" rowspan="3">
                                <table width="325" border="0">
                                    <tr>
                                        <td style="border:none">
                                            <div align="left" style="font-style:normal;">Periode Penilaian</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none">
                                            <div align="left"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none">
                                            <div align="left"><?php echo $key->periode; ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="106">Formatif</td>
                            <td width="80">
                                <div align="center">
                                    <?php if ($key->tipe == "Formatif") {
                                        echo "V";
                                    } else {
                                        echo "-";
                                    } ?>
                                </div>
                            </td>
                            <td width="168" rowspan="3">
                                <table width="165" border="0">
                                    <tr>
                                        <td style="border:none">Tahun</td>
                                    </tr>
                                    <tr>
                                        <td style="border:none"><?php date('Y', strtotime($key->tanggal)); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Sumatif</td>
                            <td>
                                <div align="center">
                                    <?php if ($key->tipe == "Sumatif") {
                                        echo "V";
                                    } else {
                                        echo "-";
                                    } ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="23">Kemajuan</td>
                            <td>
                                <div align="center"></div>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            } ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            //var_dump($kompetensi);
            $index = 0;
            ?>
            <table width="707" border="1" align="center" class="table">
                <?php foreach ($jenis as $kategori) {
                    ?>
                    <tr>
                        <td colspan="3"><b><?= $kategori->namakategori ?></b></td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Kompetensi</td>
                        <td>Nilai</td>
                    </tr>
                    <?php
                    foreach ($kompetensi as $komp) {
                        $nilai = 0;
                        if ($kategori->kodekategori == $komp->kodekategori) {

                            ?>
                            <tr>
                                <td><?= ++$index; ?></td>
                                <td><?= $komp->namakompetensi; ?></td>
                                <td><?php
                                    $totalindi = 0;
                                    foreach ($tindikator as $key) {
                                        if ($komp->kodekompetensi == $key->kodekompetensi) {
                                            $nilai += $key->nilai;
                                            $totalindi += 2;
                                        }

                                    }
                                    if ($totalindi <> 0) {
                                        $persen = ((int)$nilai / (int)$totalindi) * 100;
                                        if ($persen <= 25 or $nilai == 0) {
                                            $hasil = 1;
                                        } elseif ($persen > 25 and $persen <= 50) {
                                            $hasil = 2;
                                        } elseif ($persen > 50 and $persen <= 75) {
                                            $hasil = 3;
                                        } else {
                                            $hasil = 4;
                                        }

                                    } else {
                                        $hasil = 0;
                                    }
                                    echo "<center>" . $hasil . "</center>" ?></td>
                            </tr>
                            <?php
                        }
                    }
                } ?>


            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="717" border="0" align="center" style="margin-top:-12px;">
                <tr>
                    <td width="241" height="26" class="style4">
                        <div align="left"></div>
                    </td>
                    <td width="241" class="style4">
                        <div align="left"></div>
                    </td>
                    <td width="300" class="style43 style82"><br>Malang, <?php echo date('d-m-Y'); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="style4">
              
                        <table width="707"  align="center" >
                            <tr>
                            
                                <td width="235">
                                    <div ><span class="style83">Guru</span></div>
                                </td>
                                <td width="235">
                                    <div ><span class="style83">Penilai</span></div>
                                </td>
                                <td width="235">
                                    <div ><span class="style83"> Kepala Sekolah
            </span></div>
                                </td>
                            </tr>
                            <tr>
                                <td><br><br><br></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
            
                                <td><span class="style83"><?php echo strtoupper($listguru->nama); ?></span></td>
                                <td><span class="style83"><?php foreach ($listpenilai as $key) {
                                  if($listnilai->kodepenilaian==$key->kodepenilai){
                                    foreach ($listguruall as $key1) {
                                      if($key->kodeguru==$key1->kodeguru){
                                        echo strtoupper($key1->nama);
                                      }
                                    }
                                  }
                                } ?></span></td>
                                <td><span class="style83"><?php foreach ($listguruall as $key3) {
                                  if ($listsekolah->idguru==$key3->kodeguru) {
                                      echo strtoupper($key3->nama);
                                  }
                                } ?></span></td>
                            </tr>
                            <tr>
                                <td><span class="style83"><?php echo "NIP. ".$listguru->nip; ?></span></td>
                                <td><span class="style83"><?php echo "NIP. " ?><?php foreach ($listpenilai as $key) {
                                  if($listnilai->kodepenilaian==$key->kodepenilai){
                                    foreach ($listguruall as $key1) {
                                      if($key->kodeguru==$key1->kodeguru){
                                        echo $key1->nip;
                                      }
                                    }
                                  }
                                } ?></span></td>
                                <td><span class="style83"><?php foreach ($listguruall as $key3) {
                                  if ($listsekolah->idguru==$key3->kodeguru) {
                                      echo 'NIP. '.$key3->nip;
                                  }
                                } ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
                <tr>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>