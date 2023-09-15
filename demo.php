<?php

function demo_data_noticias(){

    $noticias = array();

    $noticias[0] = array(
        "indice" => 0,
        "post_id" => 1000,
        "titulo" => "Tech Innovations: Navigating the Digital Frontier",
        "fecha" => "Jun 21 2023",
        "descripcion" => "Welcome to our tech-savvy hub where innovation meets information. Dive into the world of cutting-edge technology as we explore the latest gadgets, delve into the intricacies of artificial intelligence.",
        "enlace" => "#",
        "imagen" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-polit.jpg" alt="Prueba" />',
        "imagen2" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-polit.jpg" alt="Prueba" />',
    );
    $noticias[1] = array(
        "indice" => 1,
        "post_id" => 1,
        "titulo" => "Tech Trends Unveiled: A Journey into the Digital World",
        "fecha" => "Jul 21 2023",
        "descripcion" => "Welcome to our tech-savvy hub where innovation meets information. Dive into the world of cutting-edge.",
        "enlace" => "#",
        "imagen" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-communications.jpg" alt="Prueba" />',
        "imagen2" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-communications.jpg" alt="Prueba" />',
    );
    $noticias[2] = array(
        "indice" => 2,
        "post_id" => 2,
        "titulo" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
        "fecha" => "Aug 21 2023",
        "descripcion" => "Welcome to our tech-savvy hub where innovation meets information. Dive into the world of..",
        "enlace" => "#",
        "imagen" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-technol.jpg" alt="Prueba" />',
        "imagen2" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-technol.jpg" alt="Prueba" />',
    );
    

    return $noticias;
}


function demo_data_programas(){

    $programas = array();

    $programas[0] = array(
        "indice" => 0,
        "post_id" => 100,
        "titulo" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
        "fecha" => 'May 21 2023',
        "enlace" => '#',
        "imagen" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-technol.jpg" alt="Prueba" />',
        "clase" => '',
        "hora_inicial" => poner_am_pm_conpuntos('4:00 pm'),
        "ubicacion" => 'Virtual',
    );
    $programas[1] = array(
        "indice" => 0,
        "post_id" => 100,
        "titulo" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
        "fecha" => 'May 21 2023',
        "enlace" => '#',
        "imagen" => '',
        "clase" => 'sin-imagen',
        "hora_inicial" => poner_am_pm_conpuntos('4:00 pm'),
        "ubicacion" => 'Virtual',
    );
    $programas[2] = array(
        "indice" => 0,
        "post_id" => 100,
        "titulo" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
        "fecha" => 'May 21 2023',
        "enlace" => '#',
        "imagen" => '<img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/pr-cat-technol.jpg" alt="Prueba" />',
        "clase" => '',
        "hora_inicial" => poner_am_pm_conpuntos('4:00 pm'),
        "ubicacion" => 'Virtual',
    );
    $programas[3] = array(
        "indice" => 0,
        "post_id" => 100,
        "titulo" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
        "fecha" => 'May 21 2023',
        "enlace" => '#',
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "clase" => '',
        "hora_inicial" => poner_am_pm_conpuntos('4:00 pm'),
        "ubicacion" => 'Virtual',
    );

    return $programas;
}

function demo_data_aliados(){
    $aliados = array();

    $aliados[0] = array(
        "indice" => 0,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[1] = array(
        "indice" => 1,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[2] = array(
        "indice" => 2,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[3] = array(
        "indice" => 3,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[4] = array(
        "indice" => 4,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[5] = array(
        "indice" => 5,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );
    $aliados[6] = array(
        "indice" => 6,
        "post_id" => 100,
        "titulo" => "nombre",
        "fecha" => "fecha",
        "imagen" => '<img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Prueba" />',
        "descripcion" => "Beyond Bits and Bytes: The Tech Enthusiast's Guide",
    );

    return $aliados;
}