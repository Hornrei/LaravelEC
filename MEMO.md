# sailの起動方法
` bash vendor/bin/sail up -d`

# sailの停止方法
` bash vendor/bin/sail down`

# portに関してのエラーが出たら
docker desktopからstopする

# sail なんたら ってコマンドを打てって言われたら
docker desktopひらいて起動しているコンテナのexecから実行する。 (sail以降のコマンドをうつ)

# コンテナ削除して作り直したとき
docker desktopのコンテナのexecから、php artisan migrate を実行

# PHPMyAdmin
http://localhost:8080
sail
password


# docker execについて
docker ps をして、sail-8.3/appのIDをコピーして、
`docker exec -it こぴーしたもの bash`
のようにするとcmdでも行ける

(例)
`docker exec -it b1d55b3 bash`


別タブでcmsを開き、execで入る。
そこでnpm run dev をしておくのがいい。



# どうしたらいいの？こういう時

## レイアウトが崩れている
A. exec で入って、`npm run dev`をして
