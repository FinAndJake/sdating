<?php

class Page extends Model {

    /*Take into account that you can get list of pages with only_published flag by inserting true */

    public function getList($only_published = false){
        $sql = "SELECT * FROM `pages` WHERE 1";
        if($only_published){
            $sql .= " AND is_published = 1;";
        }
        return $this->db->query($sql);
    }

    public function getByAlias($alias){
        $sql = "SELECT * FROM `pages` WHERE `alias` = '{$alias}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM `pages` WHERE `id` = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function save($data, $id = null){
        if (!isset($data['alias']) || !isset($data['title']) || !isset($data['content'])) {
            return false;
        }

        $id = (int)$id;
        $alias = $data['alias'];
        $title = $data['title'];
        $content = $data['content'];
        $is_published = isset($data['is_published']) ? 1 : 0;

        if(!$id){ //Add new record
            $sql = "INSERT INTO `pages` SET `alias` = '{$alias}', `title` = '{$title}', `content` = '{$content}', `is_published` = '{$is_published}';";
        } else { //Update existing
            $sql = "UPDATE `pages` SET `alias` = '{$alias}', `title` = '{$title}', `content` = '{$content}', `is_published` = '{$is_published}' WHERE `id` = '{$id}';";
        }

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "DELETE FROM `pages` WHERE `id` = '{$id}';";
        return $this->db->query($sql);
    }
}