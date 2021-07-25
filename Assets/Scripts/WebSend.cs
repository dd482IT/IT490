using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.UI;

public class WebSend : MonoBehaviour
{
    private int CoinScore = Player.Coins;
    public int Score = ScoreManager.score;
    private int multiplier = MenuSelector.multiplier;

    private string id;
    public Text ifError;
    private int Coins;

    readonly string sendURL = "http://54.83.92.194/app/gameDownload.php";
    //readonly string sendURL = "http://server.misl3d.xyz/sendScore.php";
   
    private int finalCoins;
    void Start()
    {
        Coins = CoinScore *= multiplier;
        GetUser();
        StartCoroutine("SendScore");
    }

    IEnumerator SendScore()
    {
        WWWForm form = new WWWForm();

        form.AddField("user", id);
        form.AddField("coin", Coins);
        form.AddField("score", Score);
        
        UnityWebRequest www = UnityWebRequest.Post(sendURL, form);
        www.timeout = 5;
        
        yield return www.SendWebRequest();

        if (www.result != UnityWebRequest.Result.Success)
        {
            Debug.Log(www.error);
            ifError.text = "Network Error";
        }
        else
        {
            ifError.text = "Scores Sent";
        }
    }

    void GetUser()
    {
        if (Application.absoluteURL.Contains("?"))
        {
            string user_id = Application.absoluteURL.Split("?"[0])[1];
            id = user_id.Split("="[0])[1];
            Debug.Log(id);
        }
        else
        {
            Debug.Log("Testing");
            id = "21";
            Coins = 404;
            Score = 404;
        }
    }


}
