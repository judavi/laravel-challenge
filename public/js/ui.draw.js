var UIDraw = function(window){

    var drawTable = function (el, information, template) {
        console.log(information);
        if(information !== undefined){
            DataTable.destroy();
            $(el).empty();
            var source = $(template).html();
            var compiled = Handlebars.compile(source);
            $(el).html(compiled(information));
            DataTable.init('table.table-data');
        }
        $("html, body").animate({ scrollTop: 0 }, "slow");
    };

    return{
        draw:drawTable
    };
}(window);