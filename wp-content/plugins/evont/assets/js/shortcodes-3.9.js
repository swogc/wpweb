
//Shortcode  WP 3.9

var jx_shortcode = "";
var flag = 0;

jQuery(window).bind({
    load: function() {
        
		jx_shortcode = jQuery(".shortcode-html");
        //create_button(jx_shortcode);

        jQuery("#content-html").click(function() {
            jQuery("#wp-content-editor-tools .shortcode-html").show();
        })

        jQuery("#content-tmce").click(function() {
            jQuery("#wp-content-editor-tools .shortcode-html").hide();
        })
        flag++;


    },
    mouseleave: function() {
        if (flag == 0) {
            shortcode = jQuery(".shortcode-html");
            create_button(shortcode);

            jQuery("#content-html").click(function() {
                jQuery("#wp-content-editor-tools .shortcode-html").show();
            })

            jQuery("#content-tmce").click(function() {
                jQuery("#wp-content-editor-tools .shortcode-html").hide();
            })
        }
        flag++;
    }

})

function create_button() {
    var html = '<div style="position: relative" id="shortcode-clone-td" class="mce-widget mce-btn mce-last"></div>';

    jQuery(".mce-btn.mce-last").after(html)
    jQuery("#shortcode-clone-td").html(shortcode);

    
    jQuery(".shortcode-html").hover(function() {
        jQuery(".shortcode-html > ul").show();
    }, function() {
        jQuery(".shortcode-html > ul").hide();
    })
}

jQuery(".shortcode-html ul a").click(function() {
        jQuery(".shortcode-html > ul").hide();
        var param = jQuery(this).attr("data-param");
        var tag = jQuery(this).attr("data-tag");
        var text = jQuery(this).attr("data-text");
        var All = jQuery(this).attr("data-all");
        if (All == "") {
            if (tinymce.activeEditor.selection.getContent() != "") {
                if (param != "") {
                    tinymce.activeEditor.selection.setContent('[' + tag + ' ' + param + ']' + tinymce.activeEditor.selection.getContent() + '[/' + tag + ']');
                } else {
                    tinymce.activeEditor.selection.setContent('[' + tag + ']' + tinymce.activeEditor.selection.getContent() + '[/' + tag + ']');
                }
            } else {
                tinymce.activeEditor.selection.setContent('[' + tag + ' ' + param + ']' + text + '[/' + tag + ']');
            }
        } else {
            tinymce.activeEditor.selection.setContent(All);
        }
        return false;
    })