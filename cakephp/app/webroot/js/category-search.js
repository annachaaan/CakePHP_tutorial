$(function () {
    $('#search').on('change', function () {
        $.ajax({
            url: 'http://blog.dv/categories/ajax',
            type: 'POST',
            data: {
                // valueのidを出力
                'categoryId': $(this).val(),
            }
        })
            // Ajaxリクエストが成功した時発動
            .done((data) => {
                json = JSON.parse(data);
                // console.log(json);
                var divS = '<div class="check">';
                var divE = '</div>';
                var inputS = '<input type="checkbox" name="data[Tag][Tag][]" value="';
                var inputM = '" id="TagTag';
                var inputE = '">';
                var inputF = '</input>';


                if (json) {
                    $(".check").remove();
                    // $(".select").append('※タグを選択してください');
                    json.forEach(function(value) {
                        // console.log(value);
                        $('#select-tag').append(
                            divS + inputS + value.tags.id + inputM + value.tags.id + inputE + value.tags.tag + inputF + divE
                        );
                    });
                } else {
                    $(".check").remove();
                    // $(".select").append('※選択できるタグはありません'); 
                }
            })
            // Ajaxリクエストが失敗した時発動
            .fail((data) => {
                console.log(data);
                $(".check").remove();
                // $(".select").append('※カテゴリーを選択してください');
            });
    });
});
