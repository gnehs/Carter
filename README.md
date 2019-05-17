# Carter
<img src="https://github.com/gnehs/Carter/blob/master/screenshot.jpg?raw=true">

## 提醒
- 記得新增選單，不然 NAV 會壞掉 
## 使用方法
- 把它下載下來
- 丟給 Wordpress 說你要安裝主題
- 更換主題
- 完成
## 夜間模式使用方法(2.0 以上)
1. 夜間模式預設在 21~5 點開啟
2. 您可在 `header.php` 第 `37` 行找到相關調整選項
3. 目前可調整選項：預設、強制啟用、強制停用
4. 若您要新增切換夜間模式按鈕，請複製下方程式碼並貼上到"自訂 HTML"小工具
```html
<button class="ts fluid button" onclick="NightMode_switchToNightTheme('true')" id="nightmode">On</button>
```
## 翻譯
- 翻譯文件在  /languages/  
- 翻譯完成後歡迎推 PR 回來(##
## 支援的語言
- 繁體中文(by 棒棒勝)
- 简体中文(by 棒棒勝)
- English(by Google Translate & 棒棒勝)
