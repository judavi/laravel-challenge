Handlebars.registerHelper('userRole', function (role) {
    var url = Handlebars.escapeExpression(role);

    return new Handlebars.SafeString(
        capitalizeFirstLetter(url.replace("_", " "))
    );
});

Handlebars.registerHelper('count', function (array) {
    return new Handlebars.SafeString(array.length);
});

Handlebars.registerHelper('isZero', function (array, options) {
    var arraySafe = Handlebars.escapeExpression(array);
    return arraySafe.length < 1 ? options.fn(this) : options.inverse(this);
});

Handlebars.registerHelper('isA', function (obj, type, options) {
    var objSafe = Handlebars.escapeExpression(obj);
    var typeSafe = Handlebars.escapeExpression(type);

    return objSafe === typeSafe ? options.fn(this) : options.inverse(this);
});

//Capitalizar la primera letra de un cadena
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

Handlebars.registerHelper('checkRole', function (user_role, role1, role2, role3, role4, options) {
    var role = Handlebars.escapeExpression(user_role);
    var roles = [role1, role2, role3, role4];

    if(inArray(role, roles)){
        return options.fn(this);
    }else{
        return options.inverse(this);
    }

});

//http://stackoverflow.com/questions/784012/javascript-equivalent-of-phps-in-array
function arrayCompare(a1, a2) {
    if (a1.length != a2.length) return false;
    var length = a2.length;
    for (var i = 0; i < length; i++) {
        if (a1[i] !== a2[i]) return false;
    }
    return true;
}

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(typeof haystack[i] == 'object') {
            if(arrayCompare(haystack[i], needle)) return true;
        } else {
            if(haystack[i] == needle) return true;
        }
    }
    return false;
}