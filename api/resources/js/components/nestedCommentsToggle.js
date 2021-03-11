const nestedCommentsToggle = (function () {

    let _allTogglers = document.getElementsByClassName('commentsToggler');
    let _countMainComments =_allTogglers.length;
    let _allNestedComments = [];
    for (let i = 0; i < _countMainComments; i++) {
        let mainCommentId = _allTogglers[i].getAttribute("data-mainComment");
        _allNestedComments[i] = document.getElementById("nestedComments-" + mainCommentId);
    }

    function toggle()
    {
        for (let i = 0; i < _countMainComments; i++) {
            _allTogglers[i].addEventListener('click', function () {
                if(_allNestedComments[i].hasAttribute('hidden')) {
                    _allNestedComments[i].removeAttribute("hidden");
                } else {
                    let _hidden = document.createAttribute("hidden");
                    _allNestedComments[i].setAttributeNode(_hidden);
                }
            });
        }
    }

    return {
        toggle: toggle()
    }
})();

export default nestedCommentsToggle;