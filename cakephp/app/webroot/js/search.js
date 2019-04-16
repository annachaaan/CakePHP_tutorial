$(function(){
            // Ajax input[zipcode] keyup
            $('#zipcode').on('keyup',function(){

                var count = $(this).val().length;
                // 入力文字数（ハイフン等覗く数字）が7文字の場合
                if (count == 7) {
                    $.ajax({
                        url:'http://blog.dv/postelcodes/search_ajax',
                        type:'POST',
                        data:{
                            'zipcode':$('#zipcode').val(),
                        }
                    })
                    // Ajaxリクエストが成功した時発動
                    .done( (data) => {
                        json = JSON.parse(data);
                        // jsonデータがある時のみ値を返す
                        if (json[0]) {
                            pref = json[0].postelcodes.pref;
                            city = json[0].postelcodes.city;
                            street = json[0].postelcodes.street;

                            $('#adress').val(pref + city + street);
                        }
                        // console.log(json[0]);
                    })
                    // Ajaxリクエストが失敗した時発動
                    .fail( (data) => {
                        $('.result').html(data);
                        // console.log(data);
                    });
                }
            });
        });
