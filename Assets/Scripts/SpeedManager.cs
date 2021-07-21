using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SpeedManager : MonoBehaviour
{
    public static float speed;

    public static string Crypto;
    void Start()
    {
        //speed = MenuSelector.startSpeed;
        speed = 10;
        StartCoroutine("SpeedIncrease");
    }

    IEnumerator SpeedIncrease()
    {
        while (true)
        {
            Debug.Log("Speed: " + speed);
            yield return new WaitForSeconds(7.5f);
            speed += .5f;
        }
    }
}
