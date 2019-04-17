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
                        json_length = json.length;
                        // jsonデータがある時のみ値を返す
                        if (json[0]) {
                            if (json_length == 1) {
                                pref = json[0].postelcodes.pref;
                                city = json[0].postelcodes.city;
                                street = json[0].postelcodes.street;

                                $('#adress').val(pref + city + street);
                            } else {
                                list = [];
                                for (var i = 0; i < json_length; i++) {
                                    pS = '<p>';
                                    pF = '</p>';
                                    selectS = '<datalist id="select" name="data[User][adress_auto]" class="form-control">'
                                    selectF = '</datalist>';
                                    tagS = '<option value =';
                                    tagE = '>'
                                    tagF = '</option>'
                                    list[i] = tagS + json[i].postelcodes.pref + json[i].postelcodes.city + json[i].postelcodes.street + tagE;
                                }
                                console.log(list);
                                pref = json[0].postelcodes.pref;
                                city = json[0].postelcodes.city;

                                // 配列の区切り文字を削除
                                list = list.join("");
                                // プルダウン作成
                                $('#adress').replaceWith('<input id="adress" list="select" autocomplete="on" type="text" name="data[User][adress_auto]" class="form-control"><datalist id="select">' + list + '</datalist>');
                                $('#adress').val(pref + city);
                            }
                        }
                    })
                    // Ajaxリクエストが失敗した時発動
                    .fail( (data) => {
                        $('.result').html(data);
                        // console.log(data);
                    });
                }
            });
        });
