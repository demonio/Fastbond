(function($) {
    $.KumbiaPHP = {
        aAjax: function(eve) {
            eve.preventDefault();
            var mensaje = $(this).data('confirm');
            if (mensaje && !confirm(mensaje)) {
                return false;
            }
            var to = $(this).data('ajax');
            $(to).load(this.href);
            console.log([to, this.href]);
        },

        active: function(eve) {
            var to = $(this).data('active');
            $(to).removeClass('active');
            $(this).addClass('active');
        },

        alert: function() {
            alert($(this).data('alert'));
        },

        confirm: function(eve) {
            if (!confirm($(this).data('confirm'))) {
                eve.preventDefault();
                eve.stopImmediatePropagation();
            }
        },

        effect: function(effect) {
            return function() {
                var to = $(this).data(effect);
                $(to)[effect]();
            }
        },

        formAjax: function(eve) {
            eve.preventDefault();

            var form = $(this).parents('form');
            var url = form.attr('action');
            var to;
            if (form.data('ajax_append')) {
                to = form.attr('data-ajax_append');
            } else if (form.data('ajax_prepend')) {
                to = form.attr('data-ajax_prepend');
            } else {
                to = form.attr('data-ajax');
            }
            var formData = new FormData(form[0]);

            var buttons = form.find('[type="submit"]');
            buttons.attr('disabled', 'disabled');

            var btn_name = $(this).attr('name');
            if (btn_name != undefined) {
                var btn_val = $(this).val();
                formData.append(btn_name, btn_val);
            }

            var fileData = form.find('[type="file"]');
            if (fileData.length) {
                fileData.prop('files')[0];
                formData.append('file', fileData);
            }

            $.ajax({
                url: url,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(data) {
                var mode;
                if (form.data('ajax_append')) {
                    $(to).append(data);
                    mode = 'append';
                } else if (form.data('ajax_prepend')) {
                    $(to).prepend(data);
                    mode = 'prepend';
                } else {
                    $(to).html(data);
                    mode = 'normal';
                }
                buttons.attr('disabled', null);
                console.log([to, url, mode]);
            });
        },

        live: function() {
            var to = $(this).data('live');
            var href = $(this).data('href');
            $(to).load(href, { 'keywords': this.value });
            console.log([to, href, this.value]);
        },

        remove: function() {
            var to = $(this).data('remove');
            (to == 'parent') ? $(this).parent().remove(): $(to).remove();
        },

        selectAjax: function() {
            var to = $(this).data('ajax');
            var href = $(this).data('href') + this.value;
            $(to).load(href);
            console.log([to, href]);
        },

        selectRedirect: function() {
            var href = $(this).data('redirect') + this.value;
            location.href = href;
        },

        bind: function() {
            $('body').on('click', '[data-active]', this.active);

            $('body').on('click', 'a[data-ajax]', this.aAjax);

            $('body').on('click', 'form[data-ajax] [type="submit"]', this.formAjax);
            $('body').on('click', 'form[data-ajax_append] [type="submit"]', this.formAjax);
            $('body').on('click', 'form[data-ajax_prepend] [type="submit"]', this.formAjax);

            $('body').on('change', 'select[data-ajax]', this.selectAjax);

            $('body').on('change', 'select[data-redirect]', this.selectRedirect);

            $('body').on('click', '[data-alert]', this.alert);

            $('body').on('click', '[data-click]', this.effect('click'));

            $('body').on('click', '[data-confirm]', this.confirm);

            $('body').on('click', '[data-fadeOut]', this.effect('fadeOut'));

            $('body').on('click', '[data-hide]', this.effect('hide'));

            $('body').on('keyup', '[data-live]', this.live);

            $('body').on('click', '[data-remove]', this.remove);

            $('body').on('click', '[data-show]', this.effect('show'));

            $('body').on('click', '[data-slideDown]', this.effect('slideDown'));

            $('body').on('click', '[data-toggle]', this.effect('toggle'));
        }
    };
    $.KumbiaPHP.bind();
})(jQuery);