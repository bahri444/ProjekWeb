package models

type (
	Member struct {
		no_agt   int `json:"no_agt"`
		nim      int `json:"nim"`
		nama     int `json:"nama"`
		foto     int `json:"foto"`
		jen_kel  int `json:"jen_kel"`
		telepon  int `json:"telepon"`
		email    int `json:"email"`
		akun_git int `json:"akun_git"`
		prodi    int `json:"prodi"`
		kelas    int `json:"kelas"`
		angkatan int `json:"angkatan"`
	}
)

/*const(
	table="member"
)

//fungsi get all untuk konek ke fungsi get member yang ada di main.go
func GetAll(ctx context.Context) ([]models, Member,error) {
	var resmember[]models.Member{}
	db,err:=controllers.MysqlConn()
	if err!=nil {
		log.Fatal("Cant connect To mysql",err)
	}
	QueryText:=fmt.Sprintf("SELECT*FROM %v Order By no_agt DESC",table)
	RowsQuery,err:=db.QueryContext(ctx,QueryText)
	if err!=nil {
		log.Fatal(err)
	}
	for RowsQuery.Next(){
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
			); err!=nil {
			return nil,err
		}
		resmemb=append(resmemb,resmember)
	}
	return resmemb,nil
}*/
