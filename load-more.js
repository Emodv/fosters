var jqr5 = jQuery.noConflict();
jqr5(function() {
    if (jqr5("#ajax-load-more").length) {
        var e = 1,
            t = true,
            n = false,
            r = jqr5(window),
            i = jqr5("#ajax-load-more"),
            s = jqr5("#ajax-load-more ul"),
            o = s.attr("data-path");
        if (o === undefined) {
            o = "<?php bloginfo('stylesheet_directory'); ?>/ajax-load-more.php"
        }
        if (s.attr("data-button-text") === undefined) {
            jqr5button = "Older Posts"
        } else {
            jqr5button = s.attr("data-button-text")
        }
        i.append('<div id="load-more" class="more blog_more"><span class="loader"></span><span class="text button">' + jqr5button + "</span></div>");
        var u = function() {
            jqr5("#load-more").addClass("loading");
            jqr5("#load-more span.text").text("Loading..."); 
            jqr5.ajax({
                type: "GET",
                data: {
                    postType: s.attr("data-post-type"),
                    category: s.attr("data-category"),
                    author: s.attr("data-author"),
                    taxonomy: s.attr("data-taxonomy"),
                    tag: s.attr("data-tag"),
                    postNotIn: s.attr("data-post-not-in"),
                    numPosts: s.attr("data-display-posts"),
                    year: s.attr("data-year"),
                    month: s.attr("data-month"),
                    searchblog: s.attr("data-searchblog"),
                    postscount:s.attr("data-postscount"),
                    order: s.attr("data-order"),
                    option: s.attr("data-option"),
                    pageNumber: e
                },
                url: o + "/ajax-load-more.php",
                beforeSend: function() {
                    if (e != 1) {
                        jqr5("#load-more").addClass("loading");
                        jqr5("#load-more span.text").text("Loading...")
                    }
                },
                success: function(e) {
                    jqr5data = jqr5(e);
                    if (jqr5data.length == 0) {
                        jqr5("#load-more").removeClass("loading");
                        if (jqr5(window).width() >= 600) {
                            jqr5("#load-more span.text").text("That's all!")
                        } else {
                            jqr5("#load-more span.text").text("That's all!")
                        }
                        t = false;
                        n = true
                    } else if (jqr5data.length > 0) {
                        //console.log("jqr5");
                        jqr5data = jqr5('<span id="more-blog">' + e + "</span>");
                        jqr5data.hide();
                        s.append(jqr5data);
                        jqr5data.fadeIn(500, function() {
                            jqr5("#load-more").removeClass("loading");
                            jqr5("#load-more span.text").text(jqr5button);
                            t = false
                        })
                        
                    }
                },
                error: function(e, t, n) {
                    jqr5("#load-more").removeClass("loading");
                    jqr5("#load-more span.text").text(jqr5button)
                }
            })
        };
        var remain = 0;
        var count = 0;
        var postscount= s.attr("data-postscount");
        
       if(postscount <=13){ 
          jQuery("#load-more").hide(); 
           if(postscount == 0){ 
              jQuery(".feature-landing-main").append("<h3 class='no_result_found'>Sorry, No insights found.</h3>")
           }
        }
        jqr5("#load-more").click(function() {
            if (!t && !n && !jqr5(this).hasClass("done")) {
                t = true;
                e++;
                u()
            }
        count +=1; 
        var postscount= s.attr("data-postscount");
        remain = postscount - 13 * count;
        
            if(remain <= 13){ console.log("remain")
               jQuery("#load-more").hide(); 

            }
        });
        u()
    }
})
