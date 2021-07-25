using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.UI;

public class WebRequest : MonoBehaviour
{
    //WebCall
    readonly string requestURL = "http://54.83.92.194/app/gameUpload.php";
    
    //readonly string requestURL = "https://server.misl3d.xyz/change.php";

    //Percent Change Variables
    public static float dogeChange = 1;
    public static float ethChange = 1;
    public static float btcChange = 1;

    //Text
    public Text UserDisplay;
    public Text dogeDisplay;
    public Text ethDisplay;
    public Text btcDisplay;

    private string id;

    private void Start()
    {
        //GetUser();
        StartCoroutine("Request");
    }

    IEnumerator Request()
    {
        UnityWebRequest www = UnityWebRequest.Get(requestURL);
        www.timeout = 5;
        yield return www.SendWebRequest();

        if (www.result != UnityWebRequest.Result.Success)
        {
            Debug.Log(www.error);
            UserDisplay.text = "Network Error";

            dogeDisplay.text = "null%";
            ethDisplay.text = "null%";
            btcDisplay.text = "null%";
        }
        else
        {
            string data = www.downloadHandler.text;
            string[] values = data.Split(char.Parse(","));
            btcChange = float.Parse(values[0]);
            ethChange = float.Parse(values[1]);
            dogeChange = float.Parse(values[2]);

            dogeDisplay.text = dogeChange.ToString() + "%";
            ethDisplay.text = ethChange.ToString() + "%";
            btcDisplay.text = btcChange.ToString() + "%";
        }
    }

    void GetUser()
    {
        if (Application.absoluteURL.Contains("?"))
        {
            string user_id = Application.absoluteURL.Split("?"[0])[1];
            id = user_id.Split("="[0])[1];
            UserDisplay.text = "User: " + id;
        }
        else
        {
            UserDisplay.text = "User: 404";
        }
    }
}

