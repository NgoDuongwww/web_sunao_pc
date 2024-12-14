<?php

function loadall_banners() 
{
    $sql = "select * from banners where status = 1 order by id desc";
    $listbanners = pdo_query($sql);
    return $listbanners;
}

function loadall_banners_admin() 
{
    $sql = "select * from banners order by id desc";
    $listbanners = pdo_query($sql);
    return $listbanners;
}

function insert_banners($title, $description, $image, $link, $status)
{
    $sql = "insert into banners(title, description, image, link, status) values('$title', '$description', '$image', '$link', '$status')";
    pdo_execute($sql);
}

function delete_banners($id)
{
    $sql = "delete from banners where id=" . $id;
    pdo_execute($sql);
}

function loadone_banners($id)
{
    $sql = "select * from banners where id = " . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_banners($id, $title, $description, $image, $link, $status)
{
    if ($image != "") {
        $sql = "update banners set title = '$title', description = '$description', image = '$image', link = '$link', status = '$status' where id = " . $id;
    } else {
        $sql = "update banners set title = '$title', description = '$description', link = '$link', status = '$status' where id = " . $id;
    }

    pdo_execute($sql);
}