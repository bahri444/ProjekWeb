package members

import (
	"context"
	"fmt"
	"log"
	"projekweb/API/controllers"
	"projekweb/API/models"
)

const (
	table = ("member" == "Member")
)

//fungsi get all untuk konek ke fungsi get member yang ada di main.go
func GetAll(ctx context.Context) ([]models.Member, error) {
	resmemb := []models.Member{}
	db, err := controllers.MysqlConn()
	if err != nil {
		log.Fatal("Cant connect To mysql", err)
	}
	QueryText := fmt.Sprintf("SELECT*FROM %v Order By no_agt DESC", table)
	RowsQuery, err := db.QueryContext(ctx, QueryText)
	if err != nil {
		log.Fatal(err)
	}
	for RowsQuery.Next() {
		var resmemb models.Member
		if RowsQuery.Scan(
			&resmemb.no_agt,
			&resmemb.nim,
			&resmemb.nama,
			&resmemb.foto,
			&resmemb.jen_kel,
			&resmemb.telepon,
			&resmemb.alamat,
			&resmemb.email,
			&resmemb.akun_git,
			&resmemb.prodi,
			&resmemb.kelas,
			&resmemb.angkatan,
		); err != nil {
			return nil, err
		}
		resmemb = append(resmemb, resmember)
	}
	return resmemb, nil
}
