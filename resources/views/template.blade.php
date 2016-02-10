<html>
    <head>
        <meta charset="UTF-8">
        <title>NSI :: CRM Healthcare</title>
        <script src="{{ URL::to('/') }}/semantic/dist/jquery.min.js"></script>
        <script src="{{ URL::to('/') }}/semantic/dist/semantic.min.js"></script>
        <script src="{{ URL::to('/') }}/semantic/dist/components/search.js"></script>
        <link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/semantic.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/crm_healthcare_css/crm_healthcare.css">

        @yield('header')
    </head>
    <body>
        <script src="{{ URL::to('/') }}/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        @yield('content')
        @yield('scripts')

        <script>
            var btn_num = document.getElementById('search_btn');



        $.fn.search.settings.templates = {
            message: function (response, type) {

                $('.results').empty();

                // Re-initialize url
                var url     = "";
                url     = "{{ route('add_btn', ':btn') }}";
                url     = url.replace(':btn', btn_num.value);


                $('.results').append(
                    '<div class="message '+ type +'">' +
                        '<div class="header">No Results</div>' +
                        '<div class="description">' +
                            'Sorry we cannot find the patient that you are looking for' +
                        '</div>' +
                        '<div class="ui divider"></div>'    +
                        '<div>' +
                            '<a href="'+ url +'">Add ' + btn_num.value + '</a>'+
                        '</div>'+
                    '</div>'
                );
            },
            category: function(response) {
                //console.log();
                $('.results').empty();
                $.each(response.results, function (index, item) {
                    $.each(item.results, function (indx, itm) {
                        $('.results').append(
                            '<a class="result" href="' + itm.url + '">' +
                                '<div class="content">' +
                                    '<div class="title">' + itm.title + '</div>' +
                                    '<div class="description">' + itm.description + '</div>'+
                                '</div>'+
                            '</a>'
                        );
                    })
                })
            },
        }

        $('.ui.search')
            .search({
                debug: true,
                type: 'category',
                minCharacters: 2,
                cache: true,
                apiSettings   : {
                    url: '{{ URL::to('/') }}/patient/{query}',
                    onResponse: function(patientSource) {
                        var
                            response = {
                                results : {}
                            };

                        if(patientSource.items === undefined) {
                            // no results
                            return response;
                        }
                        // translate GitHub API response to work with search

                        $.each(patientSource.items, function(index, item) {
                            var language = item.language || 'Unknown',
                            maxResults = 8
                            ;

                            // create new language category
                            if(response.results[language] === undefined) {
                                response.results[language] = {
                                    name    : language,
                                    results : []
                                };
                            }

                            // add result to category
                            response.results[language].results.push({
                                title           : item.title,
                                description     : item.description,
                                url             : item.html_url
                            });
                        });
                        return response;
                    },
                }
            });
        </script>



        <style>
            .index_modal_margin_top {
                margin-top: -295px !important;
            }
        </style>
    </body>
</html>