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

    readonly string sendURL = "https://54.83.92.194/app/gameDownload.php";

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
        form.AddField("multi", multiplier);
        
        UnityWebRequest www = UnityWebRequest.Post(sendURL, form);
        www.timeout = 5;
        yield return www;
        if (www.result != UnityWebRequest.Result.Success)
        {
            Debug.Log(www.error);
            ifError.text = "Network Error";
        }
        else
        {
            Debug.Log(www.downloadHandler.text);
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
            id = "error";
        }
    }


}
