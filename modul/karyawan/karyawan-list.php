<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <a href="dashboard.php?module=create" class="btn btn-default pull-right" type="submit"> Create</a>
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Table Karyawan</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Telphone</th>
                                                    <th>Gender</th>
                                                    <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                        <?php
                                          require_once("database.php");
                                          $db=new Database();
                                          $db->select('karyawan', '*','','');
                                          $res=$db->getResult();
                                            if(count($res) == 0){ ?>
                                                <tr>
                                                    <td colspan="8">Tidak ada data yang tersedia </td>
                                                </tr>
                                            <?php
                                                }else{
                                                foreach ($res as &$r){?>
                                                <tr>
                                                <td><?php echo $r['Nik'] ?></td>
                                                <td><?php echo $r['Nama_karyawan'] ?></td>
                                                <td><?php echo $r['Almt_karyawan'] ?></td>
                                                <td><?php echo $r['Telp_karyawan'] ?></td>
                                                <td><?php echo $r['Gender_karyawan'] ?></td>
                                                    <td class="td-actions text-right">
                                                            <a class="btn btn-info" href="?module=karyawan-show&id=<?php echo $r['id']; ?>" class=" button">
                                                                <i class="material-icons">description</i>
                                                            </a>
                                                            <a class="btn btn-default" href="?module=karyawan-edit&id=<?php echo $r['id']; ?>" class="secondary button">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            <a class="btn btn-danger" href="?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                    </td>
                                                </tr>   
                                        <?php
                                                      }
                                                  }
                                                  ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
