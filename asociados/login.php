<?php
    //pase de parametros//
   // error_reporting(0);
    ////////////////////////////////////////////////////////////////////////////////////////
    $login=trim($_POST['username']);
    $password=trim($_POST['password']);
  
    $banLog=FALSE;
    $banPass=FALSE;
    $driver='NOVAUSER';
    $user='USRCONEXION1';
    $pass='N0v@p@kEnl@c31';
    $cid=odbc_connect($driver,$user,$pass)or die(header("location:../errorconect.html"));
    $pagina= 0;
    if(!$cid){
        header("location:../errorconect.html");//mandar llamar pantalla de errores 
    }
    $login=trim($_POST['username']);
    $password=trim($_POST['password']);
    $banLog=FALSE;
    $banPass=FALSE;
    ///////////////////////////////////////////////////////////////////////////////////////
   
 
    // $sql = $cid->prepare("CALL VALOR($login $password)");
    // $sql->bindParam(1, $resuelto, PDO::PARAM_STR, 4000);

    // llamar al procedimiento almacenado
     //$sql->execute();

     $sql = "PRO_VALIDA_WEB $login, $password";
     $qry = odbc_exec($cid,$sql)or die(header("location:../errorconect.html"));
     $row =  odbc_fetch_array($qry);

    // $query = "PRO_VALIDA_WEB(?,?)";
    // $sp = odbc_prepare($cid, $query);
    // $resuelto= odbc_execute($sp,array("OSCAR","123456"));
     //mandar a ventana de login 
    
    // while(odbc_fetch_row($resuelto)){
    // $usuarioweb  = odbc_result($resuelto, 1);
    // $passwordweb = odbc_result($resuelto, 2);
    // $privilegios = odbc_result($resuelto, 3);
    // $mail = odbc_result($resuelto, 4);
     
    // }
    ////////////////////////////////////////////////////////////////////////////
    //$sql= "select * from CNUSERW";
    //$qry=odbc_exec($cid,$sql)or die("No se pudo hacer la consulta");
    //$row=odbc_fetch_array($qry);
   // echo $row['USUARIO'];
    ////////////////////////////////////////////////////////////////////////////
    if($password == $row['PASS'] and $login == $row['USUARIO']){
           session_start();//iniciamos sesioN
           $LOG=array(
           'PRIVILEGIOS'=>$row['PRIVILEGIOS'],
           'IDS'=>1,
           'USUARIO'=>$row['USUARIO'],
           'DESCRIPCION'=>$row['DESCRIPCION'],
           'TELEFONO'=>$row['TELEFONO'],
           'CORREO'=>$row['CORREO']);
          
           $_SESSION['LOG']=$LOG;
           header("location:filtro.php");
     }else
   
  // echo $usuarioweb;
 //  echo $passwordweb;

    header("location:../errorLogin.html");
  
       
   


?>