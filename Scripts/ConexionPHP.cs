using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ConexionPHP : MonoBehaviour {

    //Son los url creados en el filezilla conectando php con cs

    public bool conecto = false;
    private string conectoURL = "http://tadeolabhack.com:8081/test/Desmovilizaditos/Conexion.php?conexion=valConexion";
    private string idURL = "http://tadeolabhack.com:8081/test/Desmovilizaditos/UserID.php";
    private string envioURL = "http://tadeolabhack.com:8081/test/Desmovilizaditos/CrearActualizar.php";

    private int totalDec;

    private int UserID;
    public string Nombre;
    public string Apellido;
    private int Ult_Decision = 1;
    private int Dec;

    void Start () {

        StartCoroutine(conexion());
        	
	}

    //Dice si se genero la conexion

    public IEnumerator conexion(){
        WWW conexionData = new WWW(conectoURL);
        yield return conexionData;

        if (conexionData.text == "Conectado"){
            conecto = true;

            Debug.Log("En la buena compa toma tu 3.0");
            StartCoroutine(userID());
        }
    }

    //Da el userID del jugador actual sumando + 1

    public IEnumerator userID(){
        WWW getID = new WWW(idURL);
        yield return getID;

        if (!string.IsNullOrEmpty(getID.text)){
            UserID = int.Parse(getID.text.Trim());

            Debug.Log(UserID);
        }
    }

    public void envioDatos(int temp){
        if (conecto){
            Dec = temp;
            StartCoroutine(datosPHP());
        }  
    }

    //Forma mas segura - llama los datos y los muestra

    public IEnumerator datosPHP(){
        if (totalDec < 7)
        {
            WWWForm cargarDatos = new WWWForm();
            cargarDatos.AddField("UserID", UserID);
            cargarDatos.AddField("Nombre", Nombre);
            cargarDatos.AddField("Apellido", Apellido);
            cargarDatos.AddField("Ult_Decision", Ult_Decision);
            cargarDatos.AddField("Dec", Dec);

            WWW envioDatos = new WWW(envioURL, cargarDatos);

            yield return envioDatos;

            int decisionAct = int.Parse(envioDatos.text.Trim()) - 1;
            Debug.Log(totalDec);

            Ult_Decision = int.Parse(envioDatos.text.Trim());

            /*Debug.Log(UserID);
            Debug.Log(Nombre);
            Debug.Log(Apellido);
            Debug.Log(Ult_Decision);
            Debug.Log(Dec);*/
        }
    }

	
}//FINAL T