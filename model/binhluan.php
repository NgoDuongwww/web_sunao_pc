<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan, $status = 1)
{
    $sql = "INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan, status) 
            VALUES('$noidung', '$iduser', '$idpro', '$ngaybinhluan', '$status')";
    pdo_execute($sql);
}


function loadall_binhluan($idpro)
{
  $sql = "SELECT * FROM binhluan WHERE status = 1";
  if ($idpro > 0) 
    $sql .= " AND idpro='" . $idpro . "'";
  $sql .= " ORDER BY id DESC";
  $listbl = pdo_query($sql);
  return $listbl;
}

function loadall_binhluan_admin($idpro)
{
  $sql = "SELECT * FROM binhluan where 1 = 1";
  if ($idpro > 0) 
    $sql .= " AND idpro='" . $idpro . "'";
  $sql .= " ORDER BY id DESC";
  $listbl = pdo_query($sql);
  return $listbl;
}

function load_binhluan_with_user($idpro) {
  $sql = "SELECT binhluan.*, user.user 
          FROM binhluan 
          JOIN user ON binhluan.iduser = user.iduser 
          WHERE binhluan.idpro = :idpro 
          ORDER BY binhluan.ngaybinhluan DESC";
  return pdo_query($sql, ['idpro' => $idpro]);
}

function delete_binhluan($id)
{
  $sql = "DELETE FROM binhluan WHERE id=" . $id;
  pdo_execute($sql);
}

function update_binhluan($id, $status)
{
  $sql = "UPDATE binhluan SET status = $status WHERE id = $id";
  pdo_execute($sql);
}