package controllers

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
)

const (
	username string = "root"
	password string = "bahrysemet"
	database string = "ukm"
)

var (
	dsn = fmt.Sprintf("%v:%v@/%v", username, password, database)
)

func MysqlConn() (*sql.DB, error) {
	db, err := sql.Open("mysql", dsn)
	if err != nil {
		return nil, err
	}
	return db, nil
}
