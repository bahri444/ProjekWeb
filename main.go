package main

import (
	"context"
	"fmt"
	"log"
	"net/http"
	"projekweb/API/controllers"
	"projekweb/API/models"
	"projekweb/API/utils"
)

func main() {
	//panggil koneksi database from controllers/Config
	db, er := controllers.MysqlConn()
	if er != nil {
		log.Fatal(er)
	}
	errconn := db.Ping()
	if errconn != nil {
		panic(errconn.Error())
	}
	fmt.Println("connection succes")
	//Routing untuk masuk ke tabel member
	http.HandleFunc("/member", GetMember)

	//aktifkan server dengan port 3500
	err := http.ListenAndServe(":3500", nil)
	if err != nil {
		log.Fatal(err)
	}
}

//fungso untuk ambil data member
func GetMember(w http.ResponseWriter, r *http.Request) {
	if r.Method == "GET" {
		ctx, cancel := context.WithCancel(context.Background())
		defer cancel()
		resmemb, err := member.GetAll(ctx)
		if err != nil {
			fmt.Println(err)
		}
		utils.ResponseJSON(w, resmemb, http.StatusOK)
		return
	}
	http.Error(w, "Tidak di izinkan untuk akses tabel", http.StatusNotFound)
	return
}
