<?php
class Session
{
    private $objUsuario;
    private $listaRoles;
    private $mensajeoperacion;
    private $nombre;
    private $password;

    public function __construct()
    {
        session_start();
    }

    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    public function getListaRoles()
    {
        return $this->listaRoles;
    }

    public function setListaRoles($listaRoles)
    {
        $this->listaRoles = $listaRoles;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($valor)
    {
        $this->nombre = $valor;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($valor)
    {
        $this->password = $valor;
    }
    public function iniciar($usnombre, $uspass)
    {
        if ($usnombre != '' && $uspass != '') {
            $this->setNombre($usnombre);
            $this->setPassword($uspass);
        }
        $validar = $this->validar();

        return $validar;
    }

    public function validar()
    {
        $retorna = false;
        $abmUsuario = new AbmUsuario();
        $usuarios = $abmUsuario->buscar(["usnombre" => $this->getNombre(), "uspass" => $this->getPassword()]);
        if (count($usuarios) > 0) {
            if ($usuarios[0]->getDeshabilitado() == NULL || $usuarios[0]->getDeshabilitado() == "0000-00-00 00:00:00") {
                $_SESSION["idUsuario"] = $usuarios[0]->getIdUsuario();
                $_SESSION['usnombre'] = $usuarios[0]->getUsnombre();
                $retorna = true;
            }
        }
        return $retorna;
    }


    // public function activa()
    // {
    //     $activa = false;
    //     if (session_start()) {
    //         $activa = true;
    //     }
    //     return $activa;
    // }

    public function activa()
    {
        $activa = false;
        if (isset($_SESSION["idUsuario"])) {
            $activa = true;
        }
        return $activa;
    }

    public function getUsuario()
    {
        $abmUsuario = new AbmUsuario();
        $where = ['usnombre' => $_SESSION['usnombre'], 'idusuario' => $_SESSION['idusuario']];
        $listaUsuarios = $abmUsuario->buscar($where);
        if ($listaUsuarios >= 1) {
            $usuarioLog = $listaUsuarios[0];
        }
        return $usuarioLog;
    }

    public function getRol()
    {
        $abmRol = new AbmRol();
        $abmUsuarioRol = new AbmUsuarioRol();
        $usuario = $this->getUsuario();
        $idUsuario = $usuario->getId();
        $param = ['idusuario' => $idUsuario];
        $listaRolesUsu = $abmUsuarioRol->buscar($param);
        if ($listaRolesUsu > 1) {
            $rol = $listaRolesUsu;
        } else {
            $rol = $listaRolesUsu[0];
        }
        return $rol;
    }

    public function cerrar()
    {
        return session_destroy();
    }
}
