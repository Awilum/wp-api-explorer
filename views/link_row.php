<?php
    $api = 'posts';
    $uri = basename($_SERVER['PHP_SELF'], '.php');
    $id = $data->ID;

    switch ($uri) {
        case 'edit':
            if (isset($_GET['post_type'])) {
                if ($_GET['post_type'] == 'page') {
                    $api = 'pages';
                }
            }
            $id = $data->ID;
            break;
        case 'edit-tags':
            if (isset($_GET['taxonomy'])) {
                if ($_GET['taxonomy'] == 'post_tag') {
                    $api = 'tags';
                }
                if ($_GET['taxonomy'] == 'category') {
                    $api = 'categories';
                }
            }
            $id = $data->term_id;
            break;
        case 'edit-comments':
            $api = 'comments';
            $id = $data->comment_ID;
            break;
        default:
            # code...
            break;
    }
?>
<a data-url="<?= site_url('wp-json/wp/v2/' . $api) ?>/<?= $id ?>" title="API Explorer" href="#TB_inline?&width=600&height=550&inlineId=api-explorer" class="thickbox js-open-api-explorer"><?= __("API Explorer") ?></a>