var util = util || {};
util.toArray = function(list) {
  return Array.prototype.slice.call(list || [], 0);
};

var Terminal = Terminal || function(cmdLineContainer, outputContainer) {
  window.URL = window.URL || window.webkitURL;
  window.requestFileSystem = window.requestFileSystem || window.webkitRequestFileSystem;

  var cmdLine_ = document.querySelector(cmdLineContainer);
  var output_ = document.querySelector(outputContainer);

  const CMDS_ = [
    'clear', 'date', 'echo', 'aboutme', 'update', 'mbefile', 'msbin', 'open', 'helloworld', 'musiclist', 'play_music(1...)', 'videoslist'];
  
  
  var fs_ = null;
  var cwd_ = null;
  var history_ = [];
  var histpos_ = 0;
  var histtemp_ = 0;

  window.addEventListener('click', function(e) {
    cmdLine_.focus();
  }, false);

  cmdLine_.addEventListener('click', inputTextClick_, false);
  cmdLine_.addEventListener('keydown', historyHandler_, false);
  cmdLine_.addEventListener('keydown', processNewCommand_, false);

  //
  function inputTextClick_(e) {
    this.value = this.value;
  }

  //
  function historyHandler_(e) {
    if (history_.length) {
      if (e.keyCode == 38 || e.keyCode == 40) {
        if (history_[histpos_]) {
          history_[histpos_] = this.value;
        } else {
          histtemp_ = this.value;
        }
      }

      if (e.keyCode == 38) { // up
        histpos_--;
        if (histpos_ < 0) {
          histpos_ = 0;
        }
      } else if (e.keyCode == 40) { // down
        histpos_++;
        if (histpos_ > history_.length) {
          histpos_ = history_.length;
        }
      }

      if (e.keyCode == 38 || e.keyCode == 40) {
        this.value = history_[histpos_] ? history_[histpos_] : histtemp_;
        this.value = this.value; // Sets cursor to end of input.
      }
    }
  }

  //
  function processNewCommand_(e) {

    if (e.keyCode == 9) { // tab
      e.preventDefault();
      // Implement tab suggest.
    } else if (e.keyCode == 13) { // enter
      // Save shell history.
      if (this.value) {
        history_[history_.length] = this.value;
        histpos_ = history_.length;
      }

      // Duplicate current input and append to output section.
      var line = this.parentNode.parentNode.cloneNode(true);
      line.removeAttribute('id')
      line.classList.add('line');
      var input = line.querySelector('input.cmdline');
      input.autofocus = false;
      input.readOnly = true;
      output_.appendChild(line);

      if (this.value && this.value.trim()) {
        var args = this.value.split(' ').filter(function(val, i) {
          return val;
        });
        var cmd = args[0].toLowerCase();
        args = args.splice(1); // Remove cmd from arg list.
      }

      switch (cmd) {
        case '':
          var url = args.join(' ');
          if (!url) {
            output('Example: '  + 'client.js');
            break;
          }
          $.get( url, function(data) {
            var encodedStr = data.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
               return '&#'+i.charCodeAt(0)+';';
            });
            output('<pre>' + encodedStr + '</pre>');
          });          
          break;
        case 'clear':
          output_.innerHTML = '';
          this.value = '';
          return;
        case 'date':
          output( new Date() );
          break;
        case 'echo':
          output( args.join(' ') );
          break;
        case 'help':
          output('<div class="ls-files">' + CMDS_.join('<br>') + '</div>');
          break;
        case 'aboutme':
          output(navigator.appVersion);
          break;
        case 'update':
          output('Обновлений нет.');
           break;
        case 'mbefile':
          output('Starting');
          window.open("https://catbin.ru/cbin/labs/apps/msbin/file/", '_blank');
          break;
        case 'msbin':
          output('<h2>MS Bin</h2><p>'+'</p><p>Version 0.2 BETA</p>'+'<p>Автор:NikitaStepler</p>'+'<p>Build:1000</p>'+'<p>CatbinLabs</p>'+'<p>Версия создана 14.08.2020</p>'+'<p>End supprort: ¯\_(ツ)_/¯</p>');
          break;
        case 'open':
          output('open_[file name]');
          break;
        case 'open_tea.png':
          output('<img align="left" src="file/tea.png">');
          break;
        case 'open_fire.png':
          output('<img align="left" src="file/fire.png">');
          break;
        case 'musiclist':
          output(`<p>music1 - Rick Astley - Never Gonna Give You Up</p><p>music2 - Dead Or Alive - You Spin Me Round</p>`);
          break;
        case 'play_music1':
          output(`<p>Cool!=)</p><audio autoplay><source src="audio/Rick-Astley-Never-Gonna-Give-You-Up.mp3" id="music1" type="audio/mpeg">`);
            $.each($('#music1'), function () {
              sound.pause();
              sound.currentTime = 0;
            });
          break;
        case 'play_music2':
          output(`<p>Ok</p><audio autoplay><source src="audio/Dead Or Alive - You Spin Me Round.mp3" id="music2" type="audio/mpeg">`)
          break;
        case 'helloworld':
          output('<h1>HELLO</h1><h1>WORLD!</h1>');
          break;
        case 'videoslist':
          output('<p>video1</p><p>video2</p><p>video3</p><p>video4</p><p>video5</p><p>video6</p><p>video7</p><p>video8</p><p>video9</p><p>video10</p>');
          break;
        case 'video1':
            output(`<p>Хорошо.</p>`);
            window.open("/content/c/video/1.mp4", '_blank');
            break;
        case 'video2':
              output(`<p>Хорошо.</p>`);
              window.open("/content/c/video/2.mp4", '_blank');
              break;
        case 'video3':
                output(`<p>Хорошо.</p`);
                window.open("/content/c/video/3.mp4", '_blank');
                break;
        case 'video4':
                  output(`<p>Хорошо.</p>`);
                  window.open("/content/c/video/4.mp4", '_blank');
                  break;
        case 'video5':
                    output(`<p>Хорошо.</p>`);
                    window.open("/content/c/video/5.mp4", '_blank');
                    break;
        case 'video6':
                      output(`<p>Хорошо.</p>`);
                      window.open("/content/c/video/6.mp4", '_blank');
                      break;
        case 'video7':
                        output(`<p>Хорошо.</p>`);
                        window.open("/content/c/video/7.mp4", '_blank');
                        break;
        case 'video8':
                          output(`<p>Хорошо.</p>`);
                          window.open("/content/c/video/8.mp4", '_blank');
                          break;
        case 'video9':
                            output(`<p>Хорошо.</p>`);
                            window.open("/content/c/video/9.mp4", '_blank');
                            break;
        case 'video10':
                              output(`<p>Хорошо.</p>`);
                              window.open("/content/c/video/10.mp4", '_blank');
                              break;
        default:
          if (cmd) {
            output(cmd + ': команда не найдена');
        
          }
      };

      window.scrollTo(0, getDocHeight_());
      this.value = ''; // Clear/setup line for next input.
    }
  }

  //
  function formatColumns_(entries) {
    var maxName = entries[0].name;
    util.toArray(entries).forEach(function(entry, i) {
      if (entry.name.length > maxName.length) {
        maxName = entry.name;
      }
    });

    var height = entries.length <= 3 ?
        'height: ' + (entries.length * 15) + 'px;' : '';

    // 12px monospace font yields ~7px screen width.
    var colWidth = maxName.length * 7;

    return ['<div class="ls-files" style="-webkit-column-width:',
            colWidth, 'px;', height, '">'];
  }

  //
  function output(html) {
    output_.insertAdjacentHTML('beforeEnd', '<p>' + html + '</p>');
  }

  // Cross-browser impl to get document's height.
  function getDocHeight_() {
    var d = document;
    return Math.max(
        Math.max(d.body.scrollHeight, d.documentElement.scrollHeight),
        Math.max(d.body.offsetHeight, d.documentElement.offsetHeight),
        Math.max(d.body.clientHeight, d.documentElement.clientHeight)
    );
  }

  //
  return {
    init: function() {
      output('<div class="alert alert-warning" role="alert">Уважаемые пользователи! Возможно будут внеплановые технические работы. Приносим извинения за причиненные неудобства.</div><img align="left" src="image/MSBin.jpg" width="100" height="100" style="padding: 0px 10px 20px 0px"><h2 style="letter-spacing: 4px">MS Bin</h2><p>'+'</p><p>Version 0.2 BETA</p>' + '</p><p>Напишите "help" что бы узнать все команды.</p>');
    },
    output: output
  }
};


