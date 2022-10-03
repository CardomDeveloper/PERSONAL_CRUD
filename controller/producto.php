<?php
require_once '../config/conexion.php';
require_once '../models/Producto.php';

$producto = new Producto();

switch ($_GET['op']) {

    case "listar":
        $datos = $producto->get_producto();
        $data = array();

        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['prod_nombre'];
            $sub_array[] = '<button type="button" onClick="editar('.$row['prod_id'].');" id="'.$row['prod_id'].'" class="btn btn-outline-primary btn-icon mg-r-5 mg-b-10">
                                <div><i class="fa fa-edit"></i></div>
                            </button>';

            $sub_array[] = '<button type="button" onClick="eliminar('.$row['prod_id'].');" id="'.$row['prod_id'].'" class="btn btn-outline-warning btn-icon mg-r-5 mg-b-10">
                                <div><i class="fa fa-trash"></i></div>
                            </button>';
            
            $data[] =$sub_array;

        }

        $results = array(
            "sEcho" => 1, //informacion para el datatables
            "iTotalRecords" => count($data), // enviamos el total de registros
            "iTotalDisplayRecords" => count($data), // total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);


        break;
}
