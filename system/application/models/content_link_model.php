<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_link_model extends MY_Model
{
    protected static $fillable = [
        'link_id',
        'content_id',
        'user_id',
        'sho_id',
        'cate_link_id',
        'title',
        'description',
        'image',
        'video',
        'img_width',
        'img_height',
        'mime',
        'orientation',
        'is_public',
        'created_at',
        'updated_at',
    ];

    function __construct()
    {
        parent::__construct();
        $this->table = "tbtt_content_links";
        $this->select = "*";
    }

    public function find_link_by_id($id, $is_owner = true)
    {
        if(!$id)
            return [];

        $sql = 'SELECT content.id,
                       "tbtt_content_links" AS `type_tbl`,
                       content.user_id,
                       content.sho_id,
                       content.cate_link_id,
                       content.content_id,
                       content.show_in_library,
                       content.title,
                       content.description,
                       content.image,
                       content.img_width,
                       content.img_height,
                       content.mime,
                       content.video,
                       content.orientation,
                       content.is_public,
                       content.created_at,
                       link.id AS `link_id`,
                       link.title AS `link_title`,
                       link.description AS `link_description`,
                       link.image AS `link_image`,
                       link.img_width AS `link_img_width`,
                       link.img_height AS `link_img_height`,
                       link.link,
                       link.host
                FROM tbtt_content_links AS content 
                LEFT JOIN tbtt_links AS link ON content.link_id = link.id
                WHERE content.id ='.$id. (!$is_owner ? ' AND content.is_public = 1' : '');

        return ($result = $this->db->query($sql)) ? $result->row_array() : null;
    }

    public function links_of_collection($colection_ids, $shop_id = 0, $user_id = 0, $link_id_expel = 0, $is_owner = false)
    {
        if (!$colection_ids || !is_array($colection_ids) || (!$shop_id && !$user_id))
            return [];

        $where = '';

        if (!$is_owner) {
            $where .= ' AND content.is_public = 1';
        }

        if ($shop_id) {
            $where .= ' AND content.sho_id =' . $shop_id;
        } else {
            $where .= ' AND content.user_id =' . $user_id . ' AND content.sho_id = 0';
        }

        if ($link_id_expel) {
            $where .= ' AND content.id != ' . $link_id_expel;
        }

        $sql = 'SELECT content.id,
                       "tbtt_content_links" AS `type_tbl`,
                       content.user_id,
                       content.sho_id,
                       content.cate_link_id,
                       content.content_id,
                       content.title,
                       content.description,
                       content.image,
                       content.img_width,
                       content.img_height,
                       content.mime,
                       content.video,
                       content.orientation,
                       content.is_public,
                       content.created_at,
                       link.id AS `link_id`,
                       link.title AS `link_title`,
                       link.description AS `link_description`,
                       link.image AS `link_image`,
                       link.img_width AS `link_img_width`,
                       link.img_height AS `link_img_height`,
                       link.link,
                       link.host
                FROM tbtt_content_links AS content 
                LEFT JOIN tbtt_links AS link ON content.link_id = link.id
                WHERE content.id IN (
                  SELECT DISTINCT content_link_id FROM tbtt_collection_content_links WHERE collection_id IN ('.implode($colection_ids, ',').')
                ) '. $where . ' LIMIT 30';

        $result = $this->db->query($sql);
        return $result ? $result->result_array() : null;
    }

    public function link_of_news($new_id, $link_id_expel = 0, $is_owner = false, $order_by = 'ASC')
    {
        if (!$new_id)
            return [];

        $where = 'content.content_id = ' . $new_id;

        if (!$is_owner) {
            $where .= ' AND content.is_public = 1';
        }

        if ($link_id_expel) {
            $where .= ' AND content.id != ' . $link_id_expel;
        }

        $sql = 'SELECT content.id,
                       "tbtt_content_links" AS `type_tbl`,
                       content.user_id,
                       content.sho_id,
                       content.cate_link_id,
                       content.content_id,
                       content.title,
                       content.description,
                       content.image,
                       content.img_width,
                       content.img_height,
                       content.mime,
                       content.video,
                       content.orientation,
                       content.is_public,
                       content.created_at,
                       link.id AS `link_id`,
                       link.title AS `link_title`,
                       link.description AS `link_description`,
                       link.image AS `link_image`,
                       link.img_width AS `link_img_width`,
                       link.img_height AS `link_img_height`,
                       link.link,
                       link.host
                FROM tbtt_content_links AS content 
                LEFT JOIN tbtt_links AS link ON content.link_id = link.id
                WHERE '. $where. ' 
                ORDER BY content.created_at '. $order_by;

        return ($result = $this->db->query($sql)) ? $result->result_array() : null;
    }

    public function link_same_category($cat_id, $shop_id = 0, $user_id = 0, $link_id_expel = 0, $is_owner = false)
    {
        if(!$cat_id || (!$shop_id && !$user_id))
            return [];

        $where = 'content.cate_link_id = '. $cat_id;

        if (!$is_owner) {
            $where .= ' AND content.is_public = 1';
        }

        if($shop_id){
            $where .= ' AND content.sho_id = '. $shop_id;
        }else{
            $where .= ' AND content.user_id = '. $user_id . ' AND content.sho_id = 0';
        }

        if ($link_id_expel) {
            $where .= ' AND content.id != '. $link_id_expel;
        }

        $sql = 'SELECT content.id,
                       "tbtt_content_links" AS `type_tbl`,
                       content.user_id,
                       content.sho_id,
                       content.cate_link_id,
                       content.content_id,
                       content.title,
                       content.description,
                       content.image,
                       content.img_width,
                       content.img_height,
                       content.mime,
                       content.video,
                       content.orientation,
                       content.is_public,
                       content.created_at,
                       link.id AS `link_id`,
                       link.title AS `link_title`,
                       link.description AS `link_description`,
                       link.image AS `link_image`,
                       link.img_width AS `link_img_width`,
                       link.img_height AS `link_img_height`,
                       link.link,
                       link.host
                FROM tbtt_content_links AS content 
                LEFT JOIN tbtt_links AS link ON content.link_id = link.id
                WHERE '. $where . ' LIMIT 30';

        $result = $this->db->query($sql);
        return $result ? $result->result_array() : null;
    }

}