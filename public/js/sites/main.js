var creditCards = {
    isPublic: function() {
        return $("body").hasClass("sign-in")
    },
    showLoading: function() {
        $("#no-cards-found").hide();
        $(".loadingBar").slideDown()
    },
    hideLoading: function() {
        $("#no-cards-found").hide();
        $(".loadingBar").slideUp()
    },
    $container : $("#isotope-collection"),
    getCards: function() {
        var hasValidData, isDataNull, $loadingBar, cardDataUrl;

        $loadingBar = $("#cc-list .loadingBar");

        cardDataUrl = "/data-credit-card.json";

        $.ajax({
            url: cardDataUrl,
            cache: false,
            dataType: "JSON",
            success: function(data) {
                isDataNull = (data === null);
                if (isDataNull) {
                    $loadingBar.text("Could not get cards");
                    console.log("no json response, may have to rebuild ccXml + restart");
                    return
                }
                hasValidData = typeof(data.error) === "undefined" && typeof(data["card-offers"]) !== "undefined" && typeof(data["card-offers"].offer) !== "undefined";

                if (!hasValidData) {
                    $loadingBar.text("Could not get cards");
                    console.log("No valid data in json or had error");
                    return
                }

                creditCards.renderCards(data);

                $(".bootstrap-tooltips").tooltip({}).click(function(e) {
                    if ($(this).attr("href") !== "#") {
                        return true
                    }
                    e.stopPropagation();
                    return false
                });

                console.log("total time to getCards this includes time to get json feed + time to display");

                // if (!creditCards.isPublic()) {
                //     creditCards.insertBestMatch(creditCards.$container)
                // }
                //
                creditCards.hideLoading();

                creditCards.$container.isotope("reloadItems").isotope("reLayout");
            },
            error: function(jqXHR, textStatus) {
                creditCards.showLoading()
            }
        })
    },
    renderCards: function(cards) {
        var output = $('#creditCardsWrap');
        var logStr, offers, cards, cardNum, cdf, i, j, tags, card, cardHtm, $cards, u;
        var offers = cards["card-offers"].offer;

        $.each(offers, function(idx, obj) {
            console.log(obj);
            output.append($.Mustache.render('partial-example', obj));
        });
        // for (i = 0; i < offers.length; i++) {
        //     card = offers[i];
        //     console.log(card);
        //     output.append($.Mustache.render('partial-example', { name: offers[i].name}));
        //     // creditCardsWrap.cards.push(card);
        // }
    }
}

$(window).load(function() {

});

$(function(){
    var mustacheTemplateDir =  baseUrl + "/public/templates/";
    // Configure jquery-Mustache to warn on missing templates (to aid debugging)
    $.Mustache.options.warnOnMissingTemplates = true;

    // Load in some template from an external file.
    $.Mustache.load(mustacheTemplateDir + 'template.mustache')
        .fail(function () {
            $('#creditCardsWrap').append('Failed to load templates from <code>templates/template.mustache</code>');
        })
        .done(function () {
            creditCards.getCards();
        });
});
