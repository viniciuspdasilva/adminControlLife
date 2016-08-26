var resultado = ["cod", "unidade"];
var apresentacao = $('.resultado');

$('#codUnidade').autocomplete({
    source: 'datos.php'
});