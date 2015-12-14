#!/bin/bash

HERE=`dirname $0`
(cd "$HERE/../../" && \
find "plugins/wp-ckan-backend" \
     "plugins/wp-app-showcase" \
     "themes/wp-ogdch-theme" \
     -not -path "themes/wp-ogdch-theme/vendor/*" \
     -not -path "themes/wp-ogdch-theme/bin/*" \
     -not -path "themes/wp-ogdch-theme/node_modules/*" \
     -not -path "themes/wp-ogdch-theme/assets/external/*" \
     -not -path "plugins/wp-ckan-backend/vendor/*" \
     -not -path "plugins/wp-ckan-backend/bin/*" \
     -not -path "plugins/wp-app-showcase/vendor/*" \
     -not -path "plugins/wp-app-showcase/bin/*" \
     -type f -iregex .*php$ \
     | xargs xgettext --language=PHP --from-code=UTF-8 --no-wrap --foreign-user --package-name="wp-ogdch-theme" --package-version=1.0.0 --msgid-bugs-address=jazz@liip.ch \
     --keyword=__ \
     --keyword=_e \
     --keyword=__ngettext:1,2 \
     --keyword=_n:1,2 \
     --keyword=__ngettext_noop:1,2 \
     --keyword=_n_noop:1,2 \
     --keyword=_c \
     --keyword=_nc:4c,1,2 \
     --keyword=_x:1,2c \
     --keyword=_nx:4c,1,2 \
     --keyword=_nx_noop:4c,1,2 \
     --keyword=_ex:1,2c \
     --keyword=esc_attr__ \
     --keyword=esc_attr_e \
     --keyword=esc_attr_x:1,2c \
     --keyword=esc_html__ \
     --keyword=esc_html_e \
     --keyword=esc_html_x:1,2c \
     -o "themes/wp-ogdch-theme/languages/wp-ogdch-theme.pot" -
)