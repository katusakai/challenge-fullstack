const nestedCommentsToggle = (function () {
    let _nestedComments = document.getElementById("nestedComments-896")
    let _commentsToggler = document.getElementById('commentsToggler-896')

    function _toggle(event)
    {
        if(_nestedComments.hasAttribute('hidden')) {
            _nestedComments.removeAttribute("hidden");
        } else {
            let _hidden = document.createAttribute("hidden");
            _nestedComments.setAttributeNode(_hidden);
        }
    }

    function init()
    {
        _commentsToggler.addEventListener('click', _toggle);
    }

    return {
        init: init()
    }
})();
export default nestedCommentsToggle;