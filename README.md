# alfred-tiqav-search (v0.0.3)

Alfred Tiqav search workflow.  

ちくわぶ検索をAlfred2で行うWorkflowです。

![https://raw.githubusercontent.com/frontainer/alfred-tiqav-search/master/ss.png](https://raw.githubusercontent.com/frontainer/alfred-tiqav-search/master/ss.png)

任意のワードで検索して画像のリンクをクリップボードにコピーすることができます。

## Tips

検索結果上でShiftキーを押すとプレビューできます。  
サムネイルだけだと判断できないときには活用してみてください。

## ちくわぶ

[レス画像検索No.1／画像会話なら ちくわぶ](http://tiqav.com/)

検索にはtiqav API を利用しています  
[http://dev.tiqav.com/](http://dev.tiqav.com/)

## Change log

- version 0.0.3 - キャッシュを残すようにして高速化。キャッシュファイルが溢れる不具合の修正。
- version 0.0.2 - 日本語での検索精度が悪かったのを修正
- version 0.0.1 - 公開

## version0.02以下のキャッシュを削除する方法

version0.0.1-0.0.2でキャッシュが残ってしまう不具合があったので、キャッシュファイルを削除する場合は以下のコマンドを使用してください。

```
rm -r ~/Library/Caches/com.runningwithcrayons.Alfred-2/Workflow\ Data/com.alfredapp.frontainer.tiqav*jpg
```