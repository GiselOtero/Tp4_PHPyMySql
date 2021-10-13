<?php

class AbmUsuario
{
    /**
     * Da de alta un Usuario
     * @param array $param
     */
    public function cargarObjeto($param)
    {
        print_r('<br>');
        print_r($param);
        $obj = null;
        // Chequea si los datos obligatorios estan seteados
        if (array_key_exists('usnombre', $param) and array_key_exists('uspass', $param) and array_key_exists('usmail', $param) and array_key_exists('usdeshabilitado', $param)) {
            $obj = new Usuario();
            $obj->setear($param["idusuario"], $param["usnombre"], $param["uspass"], $param["usmail"], $param["usdeshabilitado"]);
        } else {
            echo 'aca';
        }
        return $obj;
    }

    /**
     * Devuelve obj si el array contiene idusuario para setear usuario
     * @param array $param
     * @return Obj
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (array_key_exists('idusuario', $param)) {
            $obj = new Usuario();
            $obj->setear($param["idusuario"], $param["usnombre"], $param["uspass"], $param["usmail"], $param["usdeshabilitado"]);
        }
        return $obj;
    }

    /**
     * se crea el usuario y luego el UsuarioRol
     * @param array $param
     * @return boolean
     */
    public function alta($param)
    {
        $resp = false;
        $param['idusuario'] = NULL;
        $param['usdeshabilitado'] = NULL;
        $elObjUsuario = $this->cargarObjeto($param);
        if ($elObjUsuario != null and $elObjUsuario->insertar()) {
            $abmUsuarioRol = new AbmUsuarioRol();
            $params['idusuario'] = $elObjUsuario->getIdusuario();
            $resp = true;
            if (array_key_exists("roles", $param)) {
                $roles = $param['roles'];
                foreach ($roles as $rol) {
                    $params['idrol'] = $rol;
                    $abmUsuarioRol->alta($params);
                }
            }
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($usuario = $this->cargarObjetoConClave($param)) {
            if ($usuario->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */

    public function modificacion($param)
    {
        $resp = false;
        if ($usuario = $this->cargarObjetoConClave($param)) {
            $abmUsuarioRol = new AbmUsuarioRol();
            if ($usuario->modificar()) {
                $resp = true;
                $params['idusuario'] = $usuario->getIdusuario();
                $listaUsuarioRol = $abmUsuarioRol->buscar($params);
                if (array_key_exists("roles", $param)) {
                    $roles = $param['roles'];
                    foreach ($roles as $rol) {
                        $params['idrol'] = $rol;
                        $abmUsuarioRol->alta($params);
                    }
                }
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario']))
                $where .= " and idusuario ='" . $param['idusuario'] . "'";
            if (isset($param['usnombre']))
                $where .= " and usnombre ='" . $param['usnombre'] . "'";
            if (isset($param['email']))
                $where .= " and usmail ='" . $param['email'] . "'";
            if (isset($param['uspass']))
                $where .= " and uspass ='" . $param['uspass'] . "'";
        }
        $arreglo = Usuario::listar($where);
        return $arreglo;
    }

    /**
     *devuelve los roles posibles
     *@return array
     */
    public function roles()
    {
        $rol = new rol();
        $roles = $rol->listar();
        return $roles;
    }
}
