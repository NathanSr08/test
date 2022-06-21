<?php 



function count_leads_user($id)
  {
    $connect = get_pdo();
    $sql = "select COUNT(id) from test where id_user = $id;";
    $ok = $connect->query($sql);
    $donnees = $ok->fetch();
    return $donnees;

  }
  function count_leads_user_conf()
  {
    $connect = get_pdo();
    $sql = "select COUNT(id) from test where id_c = 2;";
    $ok = $connect->query($sql);
    $donnees = $ok->fetch();
    return $donnees;

  }
  function count_leads_all()
  {
    $connect = get_pdo();
    $sql = "select COUNT(id) from test ;";
    $ok = $connect->query($sql);
    $donnees = $ok->fetch();
    return $donnees;

  }
  function count_leads_free()
  {
    $connect = get_pdo();
    $sql = "select COUNT(id) from test where id_user = 0;";
    $ok = $connect->query($sql);
    $donnees = $ok->fetch();
    return $donnees;

  }
  function count_users_all()
  {
    $connect = get_pdo();
    $sql = "select COUNT(id) from user ;";
    $ok = $connect->query($sql);
    $donnees = $ok->fetch();
    return $donnees;

  }
  ?>