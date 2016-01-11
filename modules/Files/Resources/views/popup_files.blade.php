<div id="popup-files" title="Files" style="display: none">
    <iframe src="/manager/files/manager" scrolling="no" tabindex="-1"
            style="width: 960px;height: 537px; border: none"></iframe>
</div>
<style>
    .ui-widget-header {
        border: none !important;
    }

    .ui-dialog-title {
        color: #000000;
    }

    .ui-dialog {
        z-index: 9999;
    }

</style>
<script>
    var FILESELECTED = {};
    var POPUPFILE = {
        open: function (callback) {
            jQuery('#popup-files').dialog({
                width: 1000,
                height: 600,
                close: function () {
                    if (FILESELECTED.url != '' && FILESELECTED.url != undefined) {
                        callback(FILESELECTED);
                    }
                }
            });
        },
        close: function () {
            jQuery('#popup-files').dialog('close');

        }
    }
</script>