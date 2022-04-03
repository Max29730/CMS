<?php

class PagesController extends Controller
{

    function view($id)
    {
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions' => array('online' => 1, 'idpost' => $id, 'type' => 'page')
        ));
        if (empty($d['page'])) {
            $this->e404('Page introuvable');
        }

        $this->set($d);
    }
    /**
     * Permet de récupérer les pages pour le menu
     */
    function getMEnu()
    {
        $this->loadModel('Post');
        return $this->Post->find(array(
            'conditions' => array('online' => 1, 'type' => 'page')
        ));
    }
}
