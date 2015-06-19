<h4><a href="/dataset/<?php echo pll_current_language() . '/' . $res->name; ?>"><?php echo $res->title; ?></a></h4>
<p>
    <b>Groups:</b>
    <?php
        $groups = array();
        foreach($res->groups as $group) {
          $groups[] = $group->display_name;
        }
        echo implode(', ', $groups);
    ?>
</p>
<p>
    <b>Organization:</b>
    <?php
        $org = $res->organization;
        echo $org->title;
    ?>
</p>

<hr />