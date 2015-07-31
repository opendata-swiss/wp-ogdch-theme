<h4><a href="/dataset/<?php esc_attr_e( pll_current_language() ) . '/' . esc_attr_e( $res->name ); ?>">
        <?php  esc_html_e( $res->title ); ?>
</a></h4>
<p>
    <b>Groups:</b>
    <?php
        $groups = array();
        foreach ( $res->groups as $group ) {
          $groups[] = $group->display_name;
        }
        esc_html_e( implode( ', ', $groups ) );
    ?>
</p>
<p>
    <b>Organization:</b>
    <?php
        $org = $res->organization;
        echo esc_html( $org->title );
    ?>
</p>

<hr />
