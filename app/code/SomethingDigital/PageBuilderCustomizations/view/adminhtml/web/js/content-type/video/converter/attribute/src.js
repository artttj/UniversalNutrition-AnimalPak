/*eslint-disable */
define(["Magento_PageBuilder/js/utils/object"], function (_object) {
  /**
   * Copyright © Magento, Inc. All rights reserved.
   * See COPYING.txt for license details.
   */
  var Src =
  /*#__PURE__*/
  function () {
    "use strict";

    function Src() {}

    var _proto = Src.prototype;

    /**
     * Convert value to internal format
     *
     * @param value string
     * @returns {string | object}
     */
    _proto.fromDom = function fromDom(value) {
      return value;
    }
    /**
     * Convert value to knockout format
     *
     * @param name string
     * @param data Object
     * @returns {string}
     */
    ;

    _proto.toDom = function toDom(name, data) {
      var value = (0, _object.get)(data, name);

      var youtubeRegExp = new RegExp("^(?:https?:\/\/|\/\/)?(?:www\\.|m\\.)?" + "(?:youtu\\.be\/|youtube\\.com\/(?:embed\/|v\/|watch\\?v=|watch\\?.+&v=))([\\w-]{11})(?![\\w-])");
      var vimeoRegExp = new RegExp("https?:\/\/(?:www\\.|player\\.)?vimeo.com\/(?:channels\/" + "(?:\\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\\d+)\/video\/|video\/|)(\\d+)(?:$|\/|\\?)");

      if (value === undefined) {
        return "";
      }

      var parsedUrl = youtubeRegExp.exec(value);

      var parameters = '?modestbranding=1&rel=0';

      if (parsedUrl) {
        if (data) {
          if (data.autoplay && data.autoplay === "true") {
            parameters += '&autoplay=1&mute=1';
          }

          if (data.background_video && data.background_video === "true") {
            parameters += '&controls=0&showinfo=0&autohide=1&loop=1&playlist=' + parsedUrl[1] + '&disablekb=1';
          }
        }

        if (youtubeRegExp.test(value)) {
          return "https://www.youtube.com/embed/" + parsedUrl[1] + parameters;
        } else if (vimeoRegExp.test(value)) {
          return "https://player.vimeo.com/video/" + parsedUrl[3] + "?title=0&byline=0&portrait=0" + parameters;
        }
      }

      return value;
    };

    return Src;
  }();

  return Src;
});
//# sourceMappingURL=src.js.map
