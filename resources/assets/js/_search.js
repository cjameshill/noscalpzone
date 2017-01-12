if(document.getElementById('aa-search-input')) {

    var client = algoliasearch("JIPJAKU7KV", "507d2e0320e95204a12fce80cf6a6e2b");
    var films = client.initIndex('film');
    var actors = client.initIndex('actor');
    var tickets = client.initIndex('tickets');
//initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input', {}, [
        {
            source: autocomplete.sources.hits(films, {hitsPerPage: 3}),
            displayKey: 'title',
            templates: {
                header: '<div class="aa-suggestions-category">Films</div>',
                suggestion: function (suggestion) {
                    return '<a href="/"><span>' +
                        suggestion._highlightResult.title.value + '</span><span>'
                        + suggestion._highlightResult.description.value + '</span></a>';
                }
            }
        },
        {
            source: autocomplete.sources.hits(actors, {hitsPerPage: 3}),
            displayKey: 'first_name',
            templates: {
                header: '<div class="aa-suggestions-category">Actors</div>',
                suggestion: function (suggestion) {
                    return '<span>' +
                        suggestion._highlightResult.first_name.value + '</span><span>'
                        + suggestion._highlightResult.last_name.value + '</span>';
                }
            }
        },
        {
            source: autocomplete.sources.hits(tickets, {hitsPerPage: 3}),
            displayKey: 'title',
            templates: {
                header: '<div class="aa-suggestions-category">Tickets</div>',
                suggestion: function (suggestion) {
                    return '<a href="/ticket/' + suggestion.token_id + '"><span>' +
                        suggestion._highlightResult.title.value + '</span></a><span>'
                        + suggestion._highlightResult.description.value + '</span>';
                }
            }
        }
    ]);

} else {
    console.log('Search not on page');
}